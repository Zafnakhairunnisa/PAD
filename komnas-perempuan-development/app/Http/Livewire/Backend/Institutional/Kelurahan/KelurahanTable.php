<?php

namespace App\Http\Livewire\Backend\Institutional\Kelurahan;

use App\Domains\Institutional\Models\Kelurahan\Kelurahan;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Lang;
/**
 * Class KelurahanTable.
 */
class KelurahanTable extends DataTableComponent
{
    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    public string $emptyMessage = 'Tidak ada data Kelurahan';

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
        return Kelurahan::when(
            $this->getFilter('search'),
            fn ($query, $term) => $query->search($term)
        );
    }

    public function columns(): array
    {
        return [
            Column::make(__('Kalurahan / Kelurahan'), 'kelurahan')
                ->sortable(),
            Column::make(__('Kapanewon / Kemantren'), 'kapanewon')
                ->sortable(),
            Column::make(__('Kabupaten / Kota'), 'kabupaten')
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
        return 'backend.institutional.kelurahan.includes.row';
    }

    public function deleteConfirm(int $id)
    {
        $this->emit('swal', $id);
    }
}
