<?php

namespace App\Http\Livewire\Backend\Cluster4\PusatKreatifitasAnak;

use App\Domains\Cluster4\Models\PusatKreatifitasAnak\PusatKreatifitasAnak;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class PusatKreatifitasAnakTable.
 */
class PusatKreatifitasAnakTable extends DataTableComponent
{
    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    public string $emptyMessage = 'Tidak ada data pusat kreatifitas anak';

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
        return PusatKreatifitasAnak::when(
            $this->getFilter('search'),
            fn ($query, $term) => $query->search($term)
        );
    }

    public function columns(): array
    {
        return [
            Column::make(__('Nama'), 'nama')
                ->sortable(),
            Column::make(__('Bidang'), 'bidang')
                ->sortable(),
            Column::make(__('Alamat / Dusun'), 'alamat')
                ->sortable(),
            Column::make(__('Kalurahan / Kelurahan'), 'kalurahan')
                ->sortable(),
            Column::make(__('Kapanewon / Kemantren'), 'kapanewon')
                ->sortable(),
            Column::make(__('Kabupaten / Kota'), 'location_id')
                ->sortable(),
            Column::make(__('Legalitas'), 'legalitas')
                ->sortable(),
            Column::make(__('Papan Nama'), 'papan_nama')
                ->sortable(),
            Column::make(__('Pelatihan KHA'), 'pelatihan_kha')
                ->sortable(),
            Column::make(__('Kegiatan'), 'kegiatan')
                ->sortable(),
            Column::make(__('Prestasi'), 'prestasi')
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
        return 'backend.cluster_4.pusat_kreatifitas_anak.includes.row';
    }

    public function deleteConfirm(int $id)
    {
        $this->emit('swal', $id);
    }
}
