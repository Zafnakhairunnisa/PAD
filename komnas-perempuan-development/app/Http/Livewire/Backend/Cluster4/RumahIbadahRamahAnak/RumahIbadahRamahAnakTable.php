<?php

namespace App\Http\Livewire\Backend\Cluster4\RumahIbadahRamahAnak;

use App\Domains\Cluster4\Models\RumahIbadahRamahAnak\RumahIbadahRamahAnak;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class RumahIbadahRamahAnakTable.
 */
class RumahIbadahRamahAnakTable extends DataTableComponent
{
    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    public string $emptyMessage = 'Tidak ada data rumah ibadah ramah anak';

    public function bulkActions(): array
    {
        return [
            'deleteSelected'   => __('Hapus'),
        ];
    }

    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return RumahIbadahRamahAnak::when(
            $this->getFilter('search'),
            fn ($query, $term) => $query->search($term)
        );
    }

    public function columns(): array
    {
        return [
            Column::make(__('Nama'), 'nama')
                ->sortable(),
            Column::make(__('Jenis'), 'jenis')
                ->sortable(),
            Column::make(__('Alamat / Dusun'), 'alamat')
                ->sortable(),
            Column::make(__('Kalurahan / Kelurahan'), 'kalurahan')
                ->sortable(),
            Column::make(__('Kapanewon / Kemantren'), 'kapanewon')
                ->sortable(),
            Column::make(__('Kabupaten / Kota'), 'location_id')
                ->sortable(),
            Column::make(__('Ruang Bermain'), 'ruang_bermain')
                ->sortable(),
            Column::make(__('Pusat Informasi Sahabat Anak (perpustakaan, Taman Bacaan, Pojok Baca)'), 'pojok_bacaan')
                ->sortable(),
            Column::make(__('Kawasan Tanpa Rokok '), 'kawasan_tanpa_rokok')
                ->sortable(),
            Column::make(__('Layanan Ramah Anak'), 'layanan_ramah_anak')
                ->sortable(),
            Column::make(__('Kegiatan Kreatif'), 'kegiatan_kreatif')
                ->sortable(),
            Column::make(__('Actions')),
        ];
    }

    public function deleteSelected()
    {
        $this->emit('swal', $this->selectedKeys);
    }

    public function rowView(): string
    {
        return 'backend.cluster_4.rumah_ibadah_ramah_anak.includes.row';
    }

    public function deleteConfirm(int $id)
    {
        $this->emit('swal', $id);
    }
}
