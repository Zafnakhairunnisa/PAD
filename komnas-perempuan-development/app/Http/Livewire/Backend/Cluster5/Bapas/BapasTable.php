<?php

namespace App\Http\Livewire\Backend\Cluster5\Bapas;

use App\Domains\Cluster5\Models\Bapas\Bapas;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class BapasTable.
 */
class BapasTable extends DataTableComponent
{
    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    public string $emptyMessage = 'Tidak ada data Balai Pemasyarakatan';

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
        return Bapas::when(
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
            Column::make(__('Fasilitas Anak'), 'fasilitas')
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
        return 'backend.cluster_5.bapas.includes.row';
    }

    public function deleteConfirm(int $id)
    {
        $this->emit('swal', $id);
    }
}
