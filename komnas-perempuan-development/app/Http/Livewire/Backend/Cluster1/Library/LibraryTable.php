<?php

namespace App\Http\Livewire\Backend\Cluster1\Library;

use App\Domains\Cluster1\Models\Library;
use App\Domains\Cluster1\Services\Library\LibraryService;
use App\Models\Location;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class LibraryTable.
 */
class LibraryTable extends DataTableComponent
{
    private LibraryService $service;

    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    public string $emptyMessage = 'Tidak ada data perpustakaan dan taman bacaan';

    public function boot(LibraryService $libraryService)
    {
        $this->service = $libraryService;
    }

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
        return Library::with('parent')->when(
            $this->getFilter('search'), fn ($query, $term) => $query->search($term)
        );
    }

    public function columns(): array
    {
        return [
            Column::make(__('Parent Nama'), 'parent_id')
                ->sortable(),
            Column::make(__('Nama'), 'name')
                ->sortable(),
            Column::make(__('Tahun'), 'year')
                ->sortable(),
            Column::make(__('Nilai'), 'value')
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
        return 'backend.cluster_1.library.includes.row';
    }

    public function deleteConfirm(int $id)
    {
        $this->emit('swal', $id);
    }
}
