<?php

namespace App\Http\Livewire\Backend\Institutional;

use App\Domains\Institutional\Models\RegulationRecapitulation;
use App\Domains\Institutional\Services\RegulationRecapitulationService;
use App\Models\Location;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class RecapitulationTable.
 */
class RecapitulationTable extends DataTableComponent
{
    private RegulationRecapitulationService $service;

    private $locations = [];

    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    public function __construct($id = null)
    {
        parent::__construct($id);
        $any = new \stdClass();
        $any->id = '';
        $any->name = __('Semua');
        $locations = Location::select('id', 'name')->get();
        $locations->prepend($any);

        $this->locations = $locations->mapWithKeys(function ($query) {
            return [$query->id => $query->name];
        })->toArray();
    }

    public function boot(RegulationRecapitulationService $service)
    {
        $this->service = $service;
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
        return RegulationRecapitulation::with('location:id,name')
                ->when($this->getFilter('search'), fn ($query, $term) => $query->search($term))
                ->when($this->getFilter('category'), fn ($query, $category) => $query->where('category', $category))
                ->when($this->getFilter('location'), function ($query, $location) {
                    return $query->where('location_id', '=', $location);
                });
    }

    public function columns(): array
    {
        return [
            Column::make(__('Kategori Rekapitulasi'), 'category')
                ->sortable(),
            Column::make(__('Tahun'), 'year')
                ->sortable(),
            Column::make(__('Nilai Rekapitulasi'), 'value')
                ->sortable(),
            Column::make(__('Wilayah'), 'location_id')
                ->sortable(function (Builder $query, $direction) {
                    return $query->orderBy(
                        Location::select('name')->whereColumn('regulations.location_id', 'locations.id'),
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
            'category' => Filter::make(__('Kategori Rekapitulasi'))
                ->select(config('constants.recapitulation_category')),
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
        return 'backend.institutional.regulation.recapitulation.includes.row';
    }
}
