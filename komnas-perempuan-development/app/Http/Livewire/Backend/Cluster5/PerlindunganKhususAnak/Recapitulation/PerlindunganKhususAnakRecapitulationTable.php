<?php

namespace App\Http\Livewire\Backend\Cluster5\PerlindunganKhususAnak\Recapitulation;

use App\Domains\Cluster5\Models\PerlindunganKhususAnak\PerlindunganKhususAnakRecapitulation;
use App\Domains\Cluster5\Models\PerlindunganKhususAnak\PerlindunganKhususAnakRecapitulationCategory;
use App\Models\Location;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class PerlindunganKhususAnakRecapitulationTable.
 */
class PerlindunganKhususAnakRecapitulationTable extends DataTableComponent
{
    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    public string $emptyMessage = 'Tidak ada data rekapitulasi perlindungan khusus anak';

    private $locations = [];

    private $categories = [];

    public function boot()
    {
        $this->locations = Location::select('id', 'name')->get()->mapWithKeys(function ($query) {
            return [$query->id => $query->name];
        })
        ->prepend('Semua Wilayah', '')
        ->toArray();

        $this->categories = PerlindunganKhususAnakRecapitulationCategory::select('id', 'name')
            ->get()
            ->mapWithKeys(fn ($query) => [$query->id => $query->name])
            ->prepend('Semua Kategori', '')
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
        return PerlindunganKhususAnakRecapitulation::with('location:id,name')
            ->with('category:id,name')
            ->when($this->getFilter('search'), fn ($query, $term) => $query->search($term))
            ->when($this->getFilter('location'), function ($query, $location) {
                return $query->where('location_id', '=', $location);
            })
            ->when($this->getFilter('category'), function ($query, $category) {
                return $query->where('category_id', '=', $category);
            });
    }

    public function columns(): array
    {
        return [
            Column::make(__('Kategori'), 'category_id')
                ->sortable(),
            Column::make(__('Hasil Rekapitulasi'), 'value')
                ->sortable(),
            Column::make(__('Jenis Kelamin'), 'gender')
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
            'category' => Filter::make(__('Kategori'))
                ->select($this->categories),
        ];
    }

    public function deleteSelected()
    {
        $this->emit('swal', $this->selectedKeys);
    }

    public function rowView(): string
    {
        return 'backend.cluster_5.perlindungan_khusus_anak.recapitulation.includes.row';
    }

    public function deleteConfirm(int $id)
    {
        $this->emit('swal', $id);
    }
}
