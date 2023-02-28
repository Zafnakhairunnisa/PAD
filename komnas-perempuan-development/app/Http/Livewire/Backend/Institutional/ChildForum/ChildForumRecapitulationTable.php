<?php

namespace App\Http\Livewire\Backend\Institutional\ChildForum;

use App\Domains\Institutional\Models\ChildForumRecapitulation;
use App\Domains\Institutional\Services\ChildForum\ChildForumRecapitulationService;
use App\Models\Location;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class ChildForumRecapitulationTable.
 */
class ChildForumRecapitulationTable extends DataTableComponent
{
    private ChildForumRecapitulationService $service;

    private $locations = [];

    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    public function boot(ChildForumRecapitulationService $childForumRecapitulationService)
    {
        $any = new \stdClass();
        $any->id = '';
        $any->name = __('Semua');
        $locations = Location::select('id', 'name')->get();
        $locations->prepend($any);

        $this->locations = $locations->mapWithKeys(function ($query) {
            return [$query->id => $query->name];
        })->toArray();

        $this->service = $childForumRecapitulationService;
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
        return ChildForumRecapitulation::with('location:id,name')
            ->when($this->getFilter('search'), fn ($query, $term) => $query->search($term))
            ->when($this->getFilter('location'), function ($query, $location) {
                return $query->where('location_id', '=', $location);
            });
    }

    public function columns(): array
    {
        return [
            Column::make(__('Daerah Istimewa Yogyakarta'), 'value_diy')
                ->sortable(),
            Column::make(__('Kabupaten / Kota'), 'value_kabupaten')
                ->sortable(),
            Column::make(__('Kapanewon / Kemantren'), 'value_kapanewon')
                ->sortable(),
            Column::make(__('Kalurahan / Kelurahan'), 'value_kalurahan')
                ->sortable(),
            Column::make(__('Tahun'), 'year')
                ->sortable(),
            Column::make(__('Wilayah'), 'location_id')
                ->sortable(function (Builder $query, $direction) {
                    return $query->orderBy(
                        Location::select('name')
                            ->whereColumn('child_forum_recapitulations.location_id', 'locations.id'),
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
        return 'backend.institutional.child_forum.recapitulation.includes.row';
    }
}
