<?php

namespace App\Http\Livewire\Backend\Cluster5\Lpka;

use App\Domains\Cluster5\Models\Lpka\Lpka;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class LpkaTable.
 */
class LpkaTable extends DataTableComponent
{
    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    public string $emptyMessage = 'Tidak ada data Lembaga Pembinaan Khusus Anak Yogyakarta';

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
        return Lpka::when(
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
            Column::make(__('Jenis Ruangan'), 'jenis_ruangan')
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
        return 'backend.cluster_5.lpka.includes.row';
    }

    public function deleteConfirm(int $id)
    {
        $this->emit('swal', $id);
    }
}
