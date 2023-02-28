<?php

namespace App\Http\Livewire\Backend\Institutional\Satgas;

use App\Domains\Institutional\Models\SatgasPPA;
use App\Domains\Institutional\Services\SatgasPPA\SatgasPPAService;
use App\Models\Location;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class SatgasTable.
 */
class SatgasTable extends DataTableComponent
{
    private SatgasPPAService $service;

    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    public function boot(SatgasPPAService $satgasPPAService)
    {
        $this->service = $satgasPPAService;
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
        return SatgasPPA::when($this->getFilter('search'), fn ($query, $term) => $query->search($term));
    }

    public function columns(): array
    {
        return [
            Column::make(__('Nama Satgas'), 'name')
                ->sortable(),
            Column::make(__('Nomor Telepon'), 'phone')
                ->sortable(),
            Column::make(__('Tingkatan Satgas PPA'), 'level')
                ->sortable(),
            Column::make(__('Kalurahan / Kelurahan'), 'kelurahan')
                ->sortable(),
            Column::make(__('Kapanewon / Kemantren'), 'kemantren')
                ->sortable(),
            Column::make(__('Kabupaten / Kota'), 'kabupaten')
                ->sortable(),
            Column::make(__('SK Satgas'), 'nomor')
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
        return 'backend.institutional.satgas_ppa.includes.row';
    }
}
