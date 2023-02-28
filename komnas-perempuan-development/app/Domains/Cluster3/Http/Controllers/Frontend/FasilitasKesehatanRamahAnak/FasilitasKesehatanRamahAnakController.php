<?php

namespace App\Domains\Cluster3\Http\Controllers\Frontend\FasilitasKesehatanRamahAnak;

use App\Domains\Cluster3\Models\MedicalFacility\MedicalFacilityRecapitulationCategory;
use App\Domains\Cluster3\Services\MedicalFacility\MedicalFacilityRecapitulationService;
use App\Domains\Cluster3\Services\MedicalFacility\MedicalFacilityService;
use App\Models\Traits\LocationTrait;
use Inertia\Inertia;
use Spatie\QueryBuilder\AllowedSort;

/**
 * Class FasilitasKesehatanRamahAnakController.
 */
class FasilitasKesehatanRamahAnakController
{
    use LocationTrait;

    /**
     * @var MedicalFacilityService
     */
    private $service;

    /**
     * @var MedicalFacilityRecapitulationService
     */
    private $recapitulationService;

    private $categories;

    public function __construct(
        MedicalFacilityService $service,
        MedicalFacilityRecapitulationService $recapitulationService
        ) {
        $this->service = $service;
        $this->recapitulationService = $recapitulationService;
        $this->categories = MedicalFacilityRecapitulationCategory::select('id', 'name')->get();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return inertia('Cluster3/FasilitasKesehatanRamahAnak', [
            'recapitulation' => [
                'columns' => Inertia::lazy(fn () => $this->generate_recapitulation_column()),
                'data' => $this->generate_recapitulation_data(),
            ],
            'list_data' => [
                'columns' => Inertia::lazy(fn () => $this->generate_list_column()),
                'data' => $this->generate_list_data(),
            ],
            'chart_data' => $this->generate_chart_data(),
        ]);
    }

    private function get_recapitulation_by_year(string $year, string $categoryId, string $locationId)
    {
        $timeseries = $this->recapitulationService
            ->whereHas('location')
            ->whereHas('category')
            ->with('location:id,name')
            ->with('category:id,name')
            ->select([
                'year',
                'value',
                'location_id',
                'category_id',
            ])
            ->where('year', $year)
            ->where('location_id', $locationId)
            ->where('category_id', $categoryId)
            ->first();

        if (is_null($timeseries)) {
            return [
                'year' => $year,
                'value' => 0,
                'category_id' => null,
                'category' => null,
                'location_id' => null,
                'location' => null,
            ];
        }

        return $timeseries;
    }

    private function generate_recapitulation_data()
    {
        $yearRanges = yearRange();
        $locations = $this->get_locations();

        $data = $locations->map(function ($location) use ($yearRanges) {
            $dataEveryYear = $yearRanges->map(function ($year) use ($location) {
                $dataByCategory = $this->categories->map(function ($category) use ($year, $location) {
                    return $this->get_recapitulation_by_year($year, $category->id, $location->id);
                });

                return $dataByCategory;
            });

            return [
                'key' => $location->id,
                'location' => $location->name,
                'timeseries' => $dataEveryYear,
            ];
        });

        return $data;
    }

    private function generate_recapitulation_column()
    {
        $yearRanges = yearRange();
        $columns = $yearRanges->map(function ($year, $yearIndex) {
            return [
                'align' => 'center',
                'title' => $year,
                'children' => $this->categories->map(function ($category, $categoryIndex) use ($yearIndex) {
                    return [
                        'title' => $category->name,
                        'align' => 'right',
                        'dataIndex' => ['timeseries', $yearIndex, $categoryIndex, 'value'],
                    ];
                }),
            ];
        })->prepend([
            'title' => 'Wilayah',
            'align' => 'center',
            'fixed' => 'left',
            'dataIndex' => ['location'],
        ]);

        return $columns;
    }

    private function generate_list_data()
    {
        $select = [
            'id',
            'nama',
            'surat_keterangan',
            'year',
            'category_id',
            'alamat',
            'kalurahan',
            'kapanewon',
            'location_id',
            'provinsi',
            'sdm_terlatih',
            'pusat_informasi',
            'ruang_pelayanan',
            'ruang_bermain_ramah_anak',
            'ruang_laktasi',
            'kawasan_tanpa_rokok',
            'sanitasi_sesuai_standar',
            'sarpras_ramah_disabilitas',
            'cakupan_bayi',
            'pelayanan_konseling',
            'tata_laksana',
            'jumlah_anak',
            'informasi_hak_anak',
            'mekanisme_suara_anak',
            'pelayanan_penjangkauan',
        ];
        $listData = $this->service->api()
            ->whereHas('location')
            ->whereHas('category')
            ->defaultSort('-created_at')
            ->allowedSorts([
                ...$select,
                AllowedSort::field('location', 'location_id'),
                AllowedSort::field('category', 'category_id'),
            ])
            ->allowedFields($select)
            ->select($select)
            ->with('location:id,name')
            ->with('category:id,name')
            ->paginate(request()->query('limit') ?? 10)
            ->appends(request()->query());

        return $listData;
    }

    private function generate_list_column()
    {
        $columns = [
            [
                'title' => 'Nama Faskes Ramah Anak',
                'align' => 'center',
                'dataIndex' => 'nama',
                'sorter' => true,
            ],
            [
                'title' => 'SK Ramah Anak',
                'align' => 'center',
                'dataIndex' => 'surat_keterangan',
                'sorter' => true,
            ],
            [
                'title' => 'Tahun',
                'align' => 'center',
                'dataIndex' => 'year',
                'sorter' => true,
            ],
            [
                'title' => 'Kategori',
                'align' => 'center',
                'dataIndex' => 'category',
                'sorter' => true,
            ],
            [
                'title' => 'Alamat',
                'align' => 'center',
                'dataIndex' => 'alamat',
                'sorter' => true,
            ],
            [
                'title' => 'Kalurahan / Kelurahan',
                'align' => 'center',
                'dataIndex' => 'kalurahan',
                'sorter' => true,
            ],
            [
                'title' => 'Kapanewon / Kemantren',
                'align' => 'center',
                'dataIndex' => 'kapanewon',
                'sorter' => true,
            ],
            [
                'title' => 'Kabupaten / Kota',
                'align' => 'center',
                'dataIndex' => 'location',
                'sorter' => true,
            ],
            [
                'title' => 'Provinsi',
                'align' => 'center',
                'dataIndex' => 'provinsi',
                'sorter' => true,
            ],
            [
                'title' => 'SDM Terlatih KHA',
                'align' => 'center',
                'dataIndex' => 'sdm_terlatih',
                'sorter' => true,
            ],
            [
                'title' => 'Pusat Informasi Sahabat Anak (Materi KIE Kesehatan Anak)',
                'align' => 'center',
                'dataIndex' => 'pusat_informasi',
                'sorter' => true,
            ],
            [
                'title' => 'Tersedia Ruang Pelayanan dan Konseling Bagi Anak',
                'align' => 'center',
                'dataIndex' => 'ruang_pelayanan',
                'sorter' => true,
            ],
            [
                'title' => 'Ruang Bermain Ramah Anak',
                'align' => 'center',
                'dataIndex' => 'ruang_bermain_ramah_anak',
                'sorter' => true,
            ],
            [
                'title' => 'Ruang Laktasi',
                'align' => 'center',
                'dataIndex' => 'ruang_laktasi',
                'sorter' => true,
            ],
            [
                'title' => 'Kawasan Tanpa Rokok',
                'align' => 'center',
                'dataIndex' => 'kawasan_tanpa_rokok',
                'sorter' => true,
            ],
            [
                'title' => 'Sanitasi Sesuai Standar',
                'align' => 'center',
                'dataIndex' => 'sanitasi_sesuai_standar',
                'sorter' => true,
            ],
            [
                'title' => 'Sarana Prasarana Ramah Disabilitas',
                'align' => 'center',
                'dataIndex' => 'sarpras_ramah_disabilitas',
                'sorter' => true,
            ],
            [
                'title' => 'Cakupan Bayi <6 Bulan Yang Mendapatkan ASI Eksklusif',
                'align' => 'center',
                'dataIndex' => 'cakupan_bayi',
                'sorter' => true,
            ],
            [
                'title' => 'Pelayanan Konseling Kesehatan Peduli Remaja(PKPR)',
                'align' => 'center',
                'dataIndex' => 'pelayanan_konseling',
                'sorter' => true,
            ],
            [
                'title' => 'Tata Laksana Kasus Kekerasan Terhadap Anak',
                'align' => 'center',
                'dataIndex' => 'tata_laksana',
                'sorter' => true,
            ],
            [
                'title' => 'Jumlah Anak yang Mendapat Layanan Kesehatan',
                'align' => 'center',
                'dataIndex' => 'jumlah_anak',
                'sorter' => true,
            ],
            [
                'title' => 'Pusat Informasi Hak Anak Atas Kesehatan',
                'align' => 'center',
                'dataIndex' => 'informasi_hak_anak',
                'sorter' => true,
            ],
            [
                'title' => 'Mekanisme Untuk Menampung Suara Anak',
                'align' => 'center',
                'dataIndex' => 'mekanisme_suara_anak',
                'sorter' => true,
            ],
            [
                'title' => 'Pelayanan Penjangkauan Anak di Wilayah Sekitar',
                'align' => 'center',
                'dataIndex' => 'pelayanan_penjangkauan',
                'sorter' => true,
            ],
        ];

        return $columns;
    }


    private function generate_series_data($categories)
    {
        $yearRange = yearRange();
        $locations = $this->get_locations();

        return $categories->map(function ($category) use ($yearRange, $locations) {
            $dataByYear = $yearRange->flatMap(function ($year) use ($locations, $category) {
                return $locations->map(function ($location) use ($year, $category) {
                    $d = $this->recapitulationService
                        ->select([
                            'year',
                            'value',
                            'location_id',
                            'category_id'
                        ])
                        ->where('year', '=', $year)
                        ->where('location_id', '=', $location->id)
                        ->where('category_id', '=', $category->id)
                        ->first()
                        ->value ?? 0;

                    return (int) $d;
                });
            });

            return [
                'name' => $category->name,
                'type' => 'bar',
                'barGap' => 0,
                'emphasis' => [
                    'focus' => 'self',
                ],
                'data' => $dataByYear,
                'stack' => true,
                'label' => [
                    'verticalAlign' => 'middle',
                    'distance' => 5,
                    'show' => true,
                    'rotate' => 90,
                ],
            ];
        });
    }

    private function generate_year_x_axis($locations)
    {
        $yearRange = yearRange();

        return $yearRange->flatMap(function ($year) use ($locations) {
            return $locations->map(function ($location, $locationIndex) use ($year) {
                return $locationIndex === 0 ? $year : '';
            });
        });
    }

    private function generate_category_x_axis($locations)
    {
        $yearRange = yearRange();

        return $yearRange->flatMap(function () use ($locations) {
            return $locations->map(function ($location) {
                return $location->name;
            });
        });
    }

    /**
     * @return mixed
     */
    public function generate_chart_data()
    {
        $locations = $this->get_locations();
        $recapitulationCategories = $this->categories;

        $data = [
            'tooltip' => [
                'trigger' => 'item',
                'axisPointer' => [
                    'type' => 'shadow',
                ],
            ],
            'legend' => [
                'type' => 'scroll',
                'data' => $recapitulationCategories->map(fn($category) => $category->name),
            ],
            'grid' => [
                'left' => '0%',
                'right' => '0%',
                'bottom' => '0%',
                'containLabel' => true,
            ],
            'xAxis' => [
                [
                    'type' => 'category',
                    'axisLabel' => [
                        'rotate' => -90,
                        'fontSize' => 10,
                        'overflow' => 'break',
                        'width' => 70,
                        'interval' => 0,
                        'align' => 'left',
                        'verticalAlign' => 'middle',
                    ],
                    'data' => $this->generate_category_x_axis($locations),
                ],
                [
                    'type' => 'category',
                    'position' => 'top',
                    'axisLabel' => [
                        'interval' => 0,
                    ],
                    'axisTick' => [
                        'alignWithLabel' => false,
                        'length' => 50,
                        'align' => 'left',
                    ],
                    'splitLine' => [
                        'show' => true,
                    ],
                    'data' => $this->generate_year_x_axis($locations),
                ],
            ],
            'yAxis' => [
                [
                    'type' => 'value',
                ],
            ],
            'series' => $this->generate_series_data($recapitulationCategories),
        ];

        return $data;
    }
}
