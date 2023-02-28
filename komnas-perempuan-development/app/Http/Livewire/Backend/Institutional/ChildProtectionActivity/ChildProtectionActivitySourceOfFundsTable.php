<?php

namespace App\Http\Livewire\Backend\Institutional\ChildProtectionActivity;

use App\Domains\Institutional\Models\ChildProtectionActivitySourceOfFunds;
use App\Domains\Institutional\Services\ChildProtectionActivitySourceOfFundsService;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class ChildProtectionActivitySourceOfFundsTable.
 */
class ChildProtectionActivitySourceOfFundsTable extends DataTableComponent
{
    private ChildProtectionActivitySourceOfFundsService $service;

    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    public function boot(ChildProtectionActivitySourceOfFundsService $childProtectionActivitySourceOfFundsService)
    {
        $this->service = $childProtectionActivitySourceOfFundsService;
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
        return ChildProtectionActivitySourceOfFunds::when($this->getFilter('search'), fn ($query, $term) => $query->search($term));
    }

    public function columns(): array
    {
        return [
            Column::make(__('Nama Sumber Dana'), 'name')
                ->sortable(),
            Column::make(__('Actions')),
        ];
    }

    public function deleteSelected()
    {
        if (count($this->selectedKeys)) {
            foreach ($this->selectedKeys as $selectedKey) {
                $this->service->deleteById($selectedKey);
            }
            $this->resetBulk();
        }
    }

    public function rowView(): string
    {
        return 'backend.institutional.child_protection_activity.source_of_funds.includes.row';
    }
}
