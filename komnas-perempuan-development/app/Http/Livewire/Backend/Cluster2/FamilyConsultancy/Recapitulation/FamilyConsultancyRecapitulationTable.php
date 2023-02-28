<?php

namespace App\Http\Livewire\Backend\Cluster2\FamilyConsultancy\Recapitulation;

use App\Domains\Cluster2\Models\FamilyConsultancyRecapitulation;
use App\Models\Location;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class FamilyConsultancyRecapitulationTable.
 */
class FamilyConsultancyRecapitulationTable extends DataTableComponent
{
    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    public string $emptyMessage = 'Tidak ada data rekapitulasi lembaga konsultasi keluarga';

    private $locations = [];

    public function boot()
    {
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
        return FamilyConsultancyRecapitulation::with('location:id,name')
            ->when($this->getFilter('search'), fn ($query, $term) => $query->search($term))
            ->when($this->getFilter('location'), function ($query, $location) {
                return $query->where('location_id', '=', $location);
            })
            ->when($this->getFilter('category'),
                fn ($query, $category) => $query->where('category', $category));
    }

    public function columns(): array
    {
        return [
            Column::make(__('Kategori'), 'category')
                ->sortable(),
            Column::make(__('Hasil Rekapitulasi'), 'value')
                ->sortable(),
            Column::make(__('Wilayah'), 'location_id')
                ->sortable(),
            Column::make(__('Tahun'), 'year')
                ->sortable(),
            Column::make(__('Actions')),
        ];
    }

    /**
     * @return array
     */
    public function filters(): array
    {
        $categories = collect(
            config('constants.family_consultancy.recapitulation_category')
        )
            ->mapWithKeys(function ($category) {
                return [$category => $category];
            })
            ->prepend('Semua Kategori', '')
            ->toArray();

        return [
            'location' => Filter::make(__('Wilayah'))
                ->select($this->locations),
            'category' => Filter::make(__('Kategori'))
                ->select($categories),
        ];
    }

    public function deleteSelected()
    {
        $this->emit('swal', $this->selectedKeys);
    }

    public function rowView(): string
    {
        return 'backend.cluster_2.family_consultancy.recapitulation.includes.row';
    }

    public function deleteConfirm(int $id)
    {
        $this->emit('swal', $id);
    }
}
