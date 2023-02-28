<?php

namespace App\Http\Livewire\Backend\Cluster3\Immunization\Recapitulation;

use App\Domains\Cluster3\Models\Immunization\ImmunizationRecapitulation;
use App\Models\Location;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class ImmunizationRecapitulationTable.
 */
class ImmunizationRecapitulationTable extends DataTableComponent
{
    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    public string $emptyMessage = 'Tidak ada data rekapitulasi cakupan imunisasi dasar lengkap';

    private $locations = [];

    public function boot()
    {
        $this->locations = Location::select('id', 'name')->get()->mapWithKeys(function ($query) {
            return [$query->id => $query->name];
        })
        ->prepend('Semua Wilayah', '')
        ->toArray();
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
        return ImmunizationRecapitulation::with('location:id,name')
            ->when($this->getFilter('search'), fn ($query, $term) => $query->search($term))
            ->when($this->getFilter('location'), function ($query, $location) {
                return $query->where('location_id', '=', $location);
            });
    }

    public function columns(): array
    {
        return [
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
        return [
            'location' => Filter::make(__('Wilayah'))
                ->select($this->locations),
        ];
    }

    public function deleteSelected()
    {
        $this->emit('swal', $this->selectedKeys);
    }

    public function rowView(): string
    {
        return 'backend.cluster_3.immunization.recapitulation.includes.row';
    }

    public function deleteConfirm(int $id)
    {
        $this->emit('swal', $id);
    }
}
