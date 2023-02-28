<?php

namespace App\Http\Livewire\Backend\Institutional\ChildForum;

use App\Domains\Institutional\Models\ChildForum;
use App\Domains\Institutional\Services\ChildForum\ChildForumService;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

/**
 * Class ChildForumTable.
 */
class ChildForumTable extends DataTableComponent
{
    private ChildForumService $service;

    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    public function boot(ChildForumService $childForumService)
    {
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
        return ChildForum::when($this->getFilter('search'), fn ($query, $term) => $query->search($term));
    }

    public function columns(): array
    {
        return [
            Column::make(__('Nama Forum Anak'), 'nama')
            ->addClass('col-auto')
                ->sortable(),
            Column::make(__('Tingkat Forum Anak'), 'tingkat')
                ->sortable(),
            Column::make(__('Surat Keputusan'), 'surat_keputusan')
                ->sortable(),
            Column::make(__('Waktu Pembentukan'), 'waktu_pembentukan')
                ->sortable(),
            Column::make(__('Nama Ketua'), 'nama_ketua')
                ->sortable(),
            Column::make(__('Nomor Telepon'), 'nomor_telepon')
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
            Column::make(__('Pelatihan KHA'), 'pelatihan_kha')
                ->sortable(),
            Column::make(__('Partisipasi Musrenbang'), 'partisipasi_musrenbang')
                ->sortable(),
            Column::make(__('Kegiatan'), 'kegiatan')
                ->sortable(),
            Column::make(__('Prestasi'), 'prestasi')
                ->sortable(),
            Column::make(__('Actions')),
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
        return 'backend.institutional.child_forum.includes.row';
    }
}
