<?php

namespace App\Http\Livewire\Backend\Cluster5\PolisiDiy;

use App\Domains\Cluster5\Models\PolisiDiy\PolisiDiy;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class PolisiDiyTable.
 */
class PolisiDiyTable extends DataTableComponent
{
    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    public string $emptyMessage = 'Tidak ada data Polisi Daerah DIY';

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
        return PolisiDiy::when(
            $this->getFilter('search'),
            fn ($query, $term) => $query->search($term)
        );
    }

    public function columns(): array
    {
        return [
            Column::make(__('Alamat / Dusun'), 'alamat')
                ->sortable(),
            Column::make(__('Daftar SOP Penanganan ABH'), 'daftar_sop')
                ->sortable(),
            Column::make(__('Fasilitas Penyidikan Anak'), 'fasilitas')
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
        return 'backend.cluster_5.polisi_diy.includes.row';
    }

    public function deleteConfirm(int $id)
    {
        $this->emit('swal', $id);
    }
}
