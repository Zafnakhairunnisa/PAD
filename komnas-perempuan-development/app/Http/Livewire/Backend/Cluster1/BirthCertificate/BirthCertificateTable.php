<?php

namespace App\Http\Livewire\Backend\Cluster1\BirthCertificate;

use App\Domains\Cluster1\Models\BirthCertificate;
use App\Domains\Cluster1\Services\BirthCertificate\BirthCertificateService;
use App\Models\Location;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class BirthCertificateTable.
 */
class BirthCertificateTable extends DataTableComponent
{
    private BirthCertificateService $service;

    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    public string $emptyMessage = 'Tidak ada data kepemilikan akta kelahiran';

    private $locations = [];

    public function boot(BirthCertificateService $childForumService)
    {
        $any = new \stdClass();
        $any->id = '';
        $any->name = __('Semua');
        $locations = Location::select('id', 'name')->get();
        $locations->prepend($any);

        $this->locations = $locations->mapWithKeys(function ($query) {
            return [$query->id => $query->name];
        })->toArray();

        $this->service = $childForumService;
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
        return BirthCertificate::with('location:id,name')
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
            Column::make(__('Jenis Kelamin'), 'gender')
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
        $categories = collect(config('constants.birth_certificate_category'))
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

        // if (count($this->selectedKeys)) {
        //     foreach ($this->selectedKeys as $selectedKey) {
        //         $this->service->deleteById($selectedKey);
        //     }
        //     $this->resetBulk();
        // }
    }

    public function rowView(): string
    {
        return 'backend.cluster_1.akta_kelahiran.includes.row';
    }

    public function deleteConfirm(int $id)
    {
        $this->emit('swal', $id);
    }
}
