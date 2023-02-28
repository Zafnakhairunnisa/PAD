<?php
/**
 * TODO:
 * + Move private function to service layer
 * + Make controller more slim
 */

namespace App\Domains\Institutional\Http\Controllers\Frontend\LembagaKesejahteraanSosialAnak;

use App\Domains\Cluster2\Models\ChildWelfareInstitution\ChildWelfareInstitutionCategory;
use App\Domains\Cluster2\Services\ChildWelfareInstitution\ChildWelfareInstitutionRecapitulationService;
use App\Domains\Cluster2\Services\ChildWelfareInstitution\ChildWelfareInstitutionService;
use App\Models\Traits\ImageAndDocument;
use App\Models\Traits\LocationTrait;
use Inertia\Inertia;
use Spatie\QueryBuilder\AllowedSort;

/**
 * Class LembagaKesejahteraanSosialAnakController.
 */
class LembagaKesejahteraanSosialAnakController
{
    use LocationTrait, ImageAndDocument;

    /**
     * @var ChildWelfareInstitutionService
     */
    private $service;

    /**
     * @var ChildWelfareInstitutionRecapitulationService
     */
    private $recapitulationService;

    private $categories;

    public function __construct(
        ChildWelfareInstitutionService $service,
        ChildWelfareInstitutionRecapitulationService $recapitulationService,
        ) {
        $this->service = $service;
        $this->recapitulationService = $recapitulationService;
        $this->categories = ChildWelfareInstitutionCategory::select('id', 'name')->get();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return inertia('Cluster2/LembagaKesejahteraanSosialAnak', [
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

    private function get_recapitulation_by_year(string $categoryId, string $year, string $locationId)
    {
        $timeseries = $this->recapitulationService
            ->whereHas('location')
            ->with('location:id,name')
            ->with('category:id,name')
            ->select([
                'category_id',
                'value',
                'year',
                'location_id',
            ])
            ->where('year', $year)
            ->where('location_id', $locationId)
            ->where('category_id', $categoryId)
            ->first();

        if (is_null($timeseries)) {
            return [
                'year' => $year,
                'value' => 0,
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
                    return $this->get_recapitulation_by_year($category->id, $year, $location->id);
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
            'jenis_id',
            'tahun_berdiri',
            'legalitas',
            'akreditasi',
            'dusun',
            'kalurahan',
            'kapanewon',
            'location_id',
            'media_sosial',
            'nama_pimpinan',
            'no_telepon',
            'jumlah_anak_asuh',
            'fasilitas',
            'kegiatan',
            'slug',
        ];
        $listData = $this->service->api()
            ->whereHas('location')
            ->whereHas('category')
            ->defaultSort('-created_at')
            ->allowedSorts([
                ...$select,
                AllowedSort::field('location', 'location_id'),
                AllowedSort::field('category', 'jenis_id'),
            ])
            ->allowedFields($select)
            ->select($select)
            ->with('location:id,name')
            ->with('category:id,name')
            ->withCount(['images', 'documents'])
            ->paginate(request()->query('limit') ?? 10)
            ->appends(request()->query());

        return $listData;
    }

    private function generate_list_column()
    {
        $columns = [
            [
                'title' => 'Nama Lembaga',
                'align' => 'center',
                'dataIndex' => 'nama',
                'sorter' => true,
            ],
            [
                'title' => 'Jenis Lembaga',
                'align' => 'center',
                'dataIndex' => 'category',
                'sorter' => true,
            ],
            [
                'title' => 'Tahun Berdiri',
                'align' => 'center',
                'dataIndex' => 'tahun_berdiri',
                'sorter' => true,
            ],
            [
                'title' => 'Legalitas',
                'align' => 'center',
                'dataIndex' => 'legalitas',
                'sorter' => true,
            ],
            [
                'title' => 'Akreditasi',
                'align' => 'center',
                'dataIndex' => 'akreditasi',
                'sorter' => true,
            ],
            [
                'title' => 'Alamat / Dusun',
                'align' => 'center',
                'dataIndex' => 'dusun',
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
                'title' => 'Media Sosial',
                'align' => 'center',
                'dataIndex' => 'media_sosial',
                'sorter' => true,
            ],
            [
                'title' => 'Nama Pimpipnan',
                'align' => 'center',
                'dataIndex' => 'nama_pimpinan',
                'sorter' => true,
            ],
            [
                'title' => 'Nomor Telepon',
                'align' => 'center',
                'dataIndex' => 'no_telepon',
                'sorter' => true,
            ],
            [
                'title' => 'Jumlah Anak Asuh',
                'align' => 'center',
                'dataIndex' => 'jumlah_anak_asuh',
                'sorter' => true,
            ],
            [
                'title' => 'Fasilitas',
                'align' => 'center',
                'dataIndex' => 'fasilitas',
                'sorter' => true,
            ],
            [
                'title' => 'Kegiatan',
                'align' => 'center',
                'dataIndex' => 'kegiatan',
                'sorter' => true,
            ],
            [
                'title' => 'Dokumen',
                'align' => 'center',
                'dataIndex' => 'documents_count',
            ],
            [
                'title' => 'Foto',
                'align' => 'center',
                'dataIndex' => 'images_count',
            ],
        ];

        return $columns;
    }

    private function generate_series_data($categories)
    {
        $yearRange = yearRange();
        $locations = $this->get_locations();

        /**
         * TODO:
         * + Refactoring
         * - This solution is not really good enough we need another solution
         * 
         * We do not need to show percentage so i have to remove id with value 3
         */
        return $categories->where('id', '!=', 3)->map(function ($category) use ($yearRange, $locations) {
            $dataByYear = $yearRange->flatMap(function ($year) use ($locations, $category) {
                return $locations->map(function ($location) use ($year, $category) {
                    $value = $this->recapitulationService
                        ->select([
                            'value',
                            'year',
                            'category_id',
                            'location_id',
                        ])
                        ->where('year', '=', $year)
                        ->where('location_id', '=', $location->id)
                        ->where('category_id', '=', $category->id)
                        ->first()
                        ->value ?? 0;
                    
                    return (int) $value;
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
                'data' => $recapitulationCategories,
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
