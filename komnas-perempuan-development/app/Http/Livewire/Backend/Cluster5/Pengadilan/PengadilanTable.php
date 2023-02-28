<?php

namespace App\Http\Livewire\Backend\Cluster5\Pengadilan;

use App\Domains\Cluster5\Models\Pengadilan\Pengadilan;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class PengadilanTable.
 */
class PengadilanTable extends DataTableComponent
{
    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    public string $emptyMessage = 'Tidak ada data Pengadilan DIY';

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
        return Pengadilan::when(
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
            Column::make(__('Sarana Prasarana'), 'sarana_prasarana')
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
        return 'backend.cluster_5.pengadilan.includes.row';
    }

    public function deleteConfirm(int $id)
    {
        $this->emit('swal', $id);
    }
}
