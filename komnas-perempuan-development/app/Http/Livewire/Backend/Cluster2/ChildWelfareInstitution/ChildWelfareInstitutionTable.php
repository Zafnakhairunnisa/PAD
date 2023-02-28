<?php

namespace App\Http\Livewire\Backend\Cluster2\ChildWelfareInstitution;

use App\Domains\Cluster2\Models\ChildWelfareInstitution\ChildWelfareInstitution;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class ChildWelfareInstitutionTable.
 */
class ChildWelfareInstitutionTable extends DataTableComponent
{
    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    public string $emptyMessage = 'Tidak ada data lembaga kesejahteraan sosial anak';

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
        return ChildWelfareInstitution::with('location:id,name')
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
            Column::make(__('Jenis'), 'jenis_id')
                ->sortable(),
            Column::make(__('Tahun Berdiri'), 'tahun_berdiri')
                ->sortable(),
            Column::make(__('Legalitas'), 'legalitas')
                ->sortable(),
            Column::make(__('Akreditasi'), 'akreditasi')
                ->sortable(),
            Column::make(__('Dusun / Jalan'), 'dusun')
                ->sortable(),
            Column::make(__('Kalurahan / Kelurahan'), 'kalurahan')
                ->sortable(),
            Column::make(__('Kapanewon / Kemantren'), 'kapanewon')
                ->sortable(),
            Column::make(__('Kabupaten / Kota'), 'location_id')
                ->sortable(),
            Column::make(__('Media Sosial'), 'media_sosial')
                ->sortable(),
            Column::make(__('Nama Pimpinan'), 'nama_pimpinan')
                ->sortable(),
            Column::make(__('No Telepon'), 'no_telepon')
                ->sortable(),
            Column::make(__('Jumlah Anak Asuh'), 'jumlah_anak_asuh')
                ->sortable(),
            Column::make(__('Fasilitas'), 'fasilitas')
                ->sortable(),
            Column::make(__('Kegiatan'), 'kegiatan')
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
        return 'backend.cluster_2.child_welfare_institution.includes.row';
    }

    public function deleteConfirm(int $id)
    {
        $this->emit('swal', $id);
    }
}
