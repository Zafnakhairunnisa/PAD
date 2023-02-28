<?php

namespace App\Http\Livewire\Backend\Institutional\ChildProtectionActivity;

use App\Domains\Institutional\Models\ChildProtectionActivity;
use App\Domains\Institutional\Models\ChildProtectionActivitySourceOfFunds;
use App\Domains\Institutional\Services\ChildProtectionActivityService;
use App\Models\Location;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class ChildProtectionActivityTable.
 */
class ChildProtectionActivityTable extends DataTableComponent
{
    private ChildProtectionActivityService $service;

    private $locations = [];

    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    public function boot(ChildProtectionActivityService $childProtectionActivityService)
    {
        $any = new \stdClass();
        $any->id = '';
        $any->name = __('Semua');
        $locations = Location::select('id', 'name')->get();
        $locations->prepend($any);

        $this->locations = $locations->mapWithKeys(function ($query) {
            return [$query->id => $query->name];
        })->toArray();

        $this->service = $childProtectionActivityService;
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
        return ChildProtectionActivity::with('location:id,name')
            ->with('source_of_fund:id,name')
            ->with('activity_type:id,name')
            ->when($this->getFilter('search'), fn ($query, $term) => $query->search($term))
            ->when($this->getFilter('location'), function ($query, $location) {
                return $query->where('location_id', '=', $location);
            });
    }

    public function columns(): array
    {
        return [
            Column::make(__('Nama Lembaga'), 'company_name')
                ->sortable(),
            Column::make(__('Sumber Dana'), 'source_of_fund_id')
                ->sortable(function (Builder $query, $direction) {
                    return $query->orderBy(
                        ChildProtectionActivitySourceOfFunds::select('name')
                            ->whereColumn(
                                'child_protection_activities.source_of_fund_id',
                                'child_protection_activity_source_of_funds.id'),
                        $direction
                    );
                }),
            Column::make(__('Nama Kegiatan'), 'name')
                ->sortable(),
            Column::make(__('Jenis Kegiatan'), 'type')
                ->sortable(),
            Column::make(__('Sasaran'), 'target')
                ->sortable(),
            Column::make(__('Anggaran'), 'budget')
                ->sortable(),
            Column::make(__('Tahun'), 'year')
                ->sortable(),
            Column::make(__('Wilayah'), 'location_id')
                ->sortable(function (Builder $query, $direction) {
                    return $query->orderBy(
                        Location::select('name')
                            ->whereColumn('child_protection_indices.location_id', 'locations.id'),
                        $direction
                    );
                }),
            Column::make(__('Actions')),
        ];
    }

    /**
     * @return array
     */
    public function filters(): array
    {
        return [
            'location' => Filter::make(__('Wilayah'))
                ->select($this->locations),
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
        return 'backend.institutional.child_protection_activity.includes.row';
    }
}
