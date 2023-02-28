<?php

namespace App\Http\Livewire\Backend\Cluster3\MedicalFacility;

use App\Domains\Cluster3\Models\MedicalFacility\MedicalFacility;
use App\Domains\Cluster3\Models\MedicalFacility\MedicalFacilityCategory;
use App\Models\Location;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

/**
 * Class MedicalFacilityTable.
 */
class MedicalFacilityTable extends DataTableComponent
{
    public string $defaultSortColumn = 'created_at';

    public string $defaultSortDirection = 'desc';

    public string $emptyMessage = 'Tidak ada data fasilitas kesehatan ramah anak';

    private $locations = [];

    private $categories = [];

    public function boot()
    {
        $this->locations = Location::select('id', 'name')
            ->get()
            ->mapWithKeys(function ($query) {
                return [$query->id => $query->name];
            })
            ->prepend('Semua Wilayah', '')
            ->toArray();

        $this->categories = MedicalFacilityCategory::select('id', 'name')
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
        return MedicalFacility::when(
            $this->getFilter('search'),
            fn ($query, $term) => $query->search($term)
        )
        ->with('location:id,name')
        ->with('category:id,name')
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
            Column::make(__('Nama Faskes Ramah Anak'), 'nama')
                ->sortable(),
            Column::make(__('SK Ramah Anak'), 'surat_keterangan')
                ->sortable(),
            Column::make(__('Tahun'), 'year')
                ->sortable(),
            Column::make(__('Kategori'), 'category_id')
                ->sortable(),
            Column::make(__('Alamat / Dusun'), 'alamat')
                ->sortable(),
            Column::make(__('Kalurahan / Kelurahan'), 'kalurahan')
                ->sortable(),
            Column::make(__('Kapanewon / Kemantren'), 'kapanewon')
                ->sortable(),
            Column::make(__('Kabupaten / Kota'), 'location_id')
                ->sortable(),
            Column::make(__('Provinsi'), 'provinsi')
                ->sortable(),
            Column::make(__('SDM terlatih KHA'), 'sdm_terlatih')
                ->sortable(),
            Column::make(__('Pusat Informasi Sahabat Anak (Materi KIE kesehatan anak)'), 'pusat_informasi')
                ->sortable(),
            Column::make(__('Tersedia ruang pelayanan dan konseling bagi anak'), 'ruang_pelayanan')
                ->sortable(),
            Column::make(__('Ruang Bermain Ramah Anak'), 'ruang_bermain_ramah_anak')
                ->sortable(),
            Column::make(__('R Laktasi (ASI)'), 'ruang_laktasi')
                ->sortable(),
            Column::make(__('Kawasan Tanpa Rokok'), 'kawasan_tanpa_rokok')
                ->sortable(),
            Column::make(__('Sanitasi sesuai standar'), 'sanitasi_sesuai_standar')
                ->sortable(),
            Column::make(__('Sarana prasarana ramah disabilitas'), 'sarpras_ramah_disabilitas')
                ->sortable(),
            Column::make(__('Cakupan bayi <6 bulan yang mendappat ASI Eklusif'), 'cakupan_bayi')
                ->sortable(),
            Column::make(__('Pelayanan konseling Kesehatan Peduli Remaja (PKPR)'), 'pelayanan_konseling')
                ->sortable(),
            Column::make(__('Tata Laksana Kasus Kekerasan terhadap anak (KTA)'), 'tata_laksana')
                ->sortable(),
            Column::make(__('Jumlah Anak yang mendapat layanan kesehatan'), 'jumlah_anak')
                ->sortable(),
            Column::make(__('Pusat informasi tentang hak-hak anak atas Kesehatan'), 'informasi_hak_anak')
                ->sortable(),
            Column::make(__('Mekanisme Untuk Menampung Suara Anak'), 'mekanisme_suara_anak')
                ->sortable(),
            Column::make(__('Pelayanan Penjangkauan Kesehatan Anak di wilayah sekitar'), 'pelayanan_penjangkauan')
                ->sortable(),
            Column::make(__('Actions'))
                ->addClass('text-center'),
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
        return 'backend.cluster_3.medical_facility.includes.row';
    }

    public function deleteConfirm(int $id)
    {
        $this->emit('swal', $id);
    }
}
