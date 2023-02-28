<?php

namespace App\Http\Livewire\Backend\Institutional\ChildCareOrganization;

use App\Domains\Institutional\Models\ChildCareOrganization;
use App\Domains\Institutional\Services\ChildCareOrganization\ChildCareOrganizationService;
use App\Models\Location;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class ChildCareOrganizationTable.
 */
class ChildCareOrganizationTable extends DataTableComponent
{
    private ChildCareOrganizationService $service;

    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    public function boot(ChildCareOrganizationService $childForumService)
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
        return ChildCareOrganization::with('location:id,name')
            ->when($this->getFilter('search'), fn ($query, $term) => $query->search($term))
            ->when($this->getFilter('location'), function ($query, $location) {
                return $query->where('location_id', '=', $location);
            });
    }

    public function columns(): array
    {
        return [
            Column::make(__('Nama Organisasi'), 'nama')
                ->addClass('col-auto')
                ->sortable(),
            Column::make(__('Wilayah Kerja'), 'location_id')
                ->sortable(),
            Column::make(__('Alamat'), 'alamat')
                ->sortable(),
            Column::make(__('Kalurahan / Kelurahan'), 'kalurahan')
                ->sortable(),
            Column::make(__('Kapanewon / Kemantren'), 'kapanewon')
                ->sortable(),
            Column::make(__('Kabupaten / Kota'), 'kabupaten')
                ->sortable(),
            Column::make(__('Media Sosial'), 'media_sosial'),
            Column::make(__('Nomor Telepon'), 'nomor_telepon')
                ->sortable(),
            Column::make(__('Nama Pimpinan'), 'nama_pimpinan')
                ->sortable(),
            Column::make(__('Kegiatan'), 'kegiatan')
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
        if (count($this->selectedKeys)) {
            foreach ($this->selectedKeys as $selectedKey) {
                $this->service->deleteById($selectedKey);
            }
            $this->resetBulk();
        }
    }

    public function rowView(): string
    {
        return 'backend.institutional.child_care_organization.includes.row';
    }
}
