<?php

namespace App\Http\Livewire\Backend\Institutional;

use App\Domains\Institutional\Models\Regulation;
use App\Domains\Institutional\Services\RegulationService;
use App\Models\Location;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class RegulationTable.
 */
class RegulationTable extends DataTableComponent
{
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
        return Regulation::with('location:id,name')
            ->when($this->getFilter('search'), fn ($query, $term) => $query->search($term))
            ->when($this->getFilter('rule_type'), function ($query, $ruleType) {
                return $query->where('rule_type', '=', $ruleType);
            })
            ->when($this->getFilter('location'), function ($query, $location) {
                return $query->where('location_id', '=', $location);
            });
    }

    public function columns(): array
    {
        return [
            Column::make(__('Nama Peraturan'), 'name')
                ->sortable(),
            Column::make(__('Tahun'), 'year')
                ->sortable(),
            Column::make(__('Jenis Peraturan/Kebijakan'), 'rule_type')
                ->sortable(),
            Column::make(__('Macam Peraturan/Kebijakan'), 'type')
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
            'rule_type' => Filter::make(__('Jenis Peraturan/Kebijakan'))
                ->select([
                    '' => __('Semua'),
                    config('constants.rule_type')[0] => config('constants.rule_type')[0],
                    config('constants.rule_type')[1] => config('constants.rule_type')[1],
                    config('constants.rule_type')[2] => config('constants.rule_type')[2],
                    config('constants.rule_type')[3] => config('constants.rule_type')[3],
                    config('constants.rule_type')[4] => config('constants.rule_type')[4],
                    config('constants.rule_type')[5] => config('constants.rule_type')[5],
                ]),
            'location' => Filter::make(__('Wilayah'))
                ->select($this->locations),
        ];
    }

    public function deleteSelected()
    {
        if (count($this->selectedKeys)) {
            Regulation::destroy($this->selectedKeys);
            $this->resetBulk();
        }
    }

    public function rowView(): string
    {
        return 'backend.institutional.regulation.includes.row';
    }
}
