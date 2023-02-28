<?php

namespace App\Http\Livewire\Backend\Cluster2\ChildFriendlyPlayroom;

use App\Domains\Cluster2\Models\ChildFriendlyPlayroom\ChildFriendlyPlayroom;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class ChildFriendlyPlayroomTable.
 */
class ChildFriendlyPlayroomTable extends DataTableComponent
{
    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    public string $emptyMessage = 'Tidak ada data ruang bermain ramah anak';

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
        return ChildFriendlyPlayroom::with('location:id,name')
            ->when($this->getFilter('search'), fn ($query, $term) => $query->search($term))
            ->when($this->getFilter('location'), function ($query, $location) {
                return $query->where('location_id', '=', $location);
            });
    }

    public function columns(): array
    {
        return [
            Column::make(__('Nama RBRA'), 'nama')
                ->sortable(),
            Column::make(__('Alamat'), 'alamat')
                ->sortable(),
            Column::make(__('Kalurahan / Kelurahan'), 'kalurahan')
                ->sortable(),
            Column::make(__('Kapanewon / Kemantren'), 'kapanewon')
                ->sortable(),
            Column::make(__('Kabupaten / Kota'), 'location_id')
                ->sortable(),
            Column::make(__('Sertifikasi'), 'sertifikasi')
                ->sortable(),
            Column::make(__('Jenis'), 'jenis')
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
        return 'backend.cluster_2.child_friendly_playroom.includes.row';
    }

    public function deleteConfirm(int $id)
    {
        $this->emit('swal', $id);
    }
}
