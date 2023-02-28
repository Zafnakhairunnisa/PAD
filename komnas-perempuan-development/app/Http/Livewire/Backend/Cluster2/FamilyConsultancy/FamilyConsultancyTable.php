<?php

namespace App\Http\Livewire\Backend\Cluster2\FamilyConsultancy;

use App\Domains\Cluster2\Models\FamilyConsultancy\FamilyConsultancy;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class FamilyConsultancyTable.
 */
class FamilyConsultancyTable extends DataTableComponent
{
    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    public string $emptyMessage = 'Tidak ada data lembaga konsultasi keluarga';

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
        return FamilyConsultancy::with('location:id,name')
            ->with('category:id,name')
            ->when($this->getFilter('search'), fn ($query, $term) => $query->search($term))
            ->when($this->getFilter('location'), function ($query, $location) {
                return $query->where('location_id', '=', $location);
            });
    }

    public function columns(): array
    {
        return [
            Column::make(__('Nama Lembaga'), 'nama')
                ->sortable(),
            Column::make(__('Jenis'), 'kategori_id')
                ->sortable(),
            Column::make(__('Alamat'), 'alamat')
                ->sortable(),
            Column::make(__('Kalurahan / Kelurahan'), 'kalurahan')
                ->sortable(),
            Column::make(__('Kapanewon / Kemantren'), 'kapanewon')
                ->sortable(),
            Column::make(__('Kabupaten / Kota'), 'location_id')
                ->sortable(),
            Column::make(__('Media Sosial'), 'media_sosial')
                ->sortable(),
            Column::make(__('Pimpinan'), 'nama_pimpinan')
                ->sortable(),
            Column::make(__('No telepon'), 'no_telepon')
                ->sortable(),
            Column::make(__('Nomer Sertifikasi'), 'no_sertifikasi')
                ->sortable(),
            Column::make(__('Kegiatan'), 'kegiatan')
                ->sortable(),
            Column::make(__('Jumlah Klien per Tahun'), 'klien')
                ->sortable(),
            Column::make(__('Fasilitas'), 'fasilitas')
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
        return 'backend.cluster_2.family_consultancy.includes.row';
    }

    public function deleteConfirm(int $id)
    {
        $this->emit('swal', $id);
    }
}
