<?php

namespace App\Http\Livewire\Backend\Institutional\ChildMedia;

use App\Domains\Institutional\Models\ChildMedia;
use App\Domains\Institutional\Services\ChildMedia\ChildMediaService;
use App\Models\MediaType;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class ChildMediaTable.
 */
class ChildMediaTable extends DataTableComponent
{
    private ChildMediaService $service;

    private $mediaTypes = [];

    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    public function boot(ChildMediaService $childForumService)
    {
        $any = new \stdClass();
        $any->id = '';
        $any->name = __('Semua');
        $mediaTypes = MediaType::select('id', 'name')->get();
        $mediaTypes->prepend($any);

        $this->mediaTypes = $mediaTypes->mapWithKeys(function ($query) {
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
        return ChildMedia::with('mediaType:id,name')
            ->when($this->getFilter('search'), fn ($query, $term) => $query->search($term))
            ->when($this->getFilter('media_type'), function ($query, $mediaType) {
                return $query->where('jenis_media_id', '=', $mediaType);
            });
    }

    public function columns(): array
    {
        return [
            Column::make(__('Nama Media'), 'nama')
                ->addClass('col-auto')
                ->sortable(),
            Column::make(__('Jenis Media'), 'jenis_media_id')
                ->sortable(),
            Column::make(__('Alamat'), 'alamat')
                ->sortable(),
            Column::make(__('Kalurahan / Kelurahan'), 'kalurahan')
                ->sortable(),
            Column::make(__('Kapanewon / Kemantren'), 'kapanewon')
                ->sortable(),
            Column::make(__('Kabupaten / Kota'), 'kabupaten')
                ->sortable(),
            Column::make(__('Media Sosial'), 'media_sosial')
                ->sortable(),
            Column::make(__('Nomor Telepon'), 'nomor_telepon')
                ->sortable(),
            Column::make(__('Nama Pimpinan'), 'nama_pimpinan')
                ->sortable(),
            Column::make(__('Nama Rubrik / Acara'), 'nama_acara')
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
            'media_type' => Filter::make(__('Jenis Media'))
                ->select($this->mediaTypes),
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
        return 'backend.institutional.child_media.includes.row';
    }
}
