<?php

namespace App\Domains\Institutional\Http\Controllers\Frontend\KapanewonLayakAnak;

use App\Domains\Institutional\Models\Kapanewon\KapanewonRecapitulationCategory;
use App\Domains\Institutional\Services\Kapanewon\KapanewonRecapitulationService;
use App\Domains\Institutional\Services\Kapanewon\KapanewonService;
use App\Models\Traits\LocationTrait;
use Inertia\Inertia;

/**
 * Class KapanewonLayakAnakController.
 */
class KapanewonLayakAnakController
{
    use LocationTrait;

    /**
     * @var KapanewonRecapitulationService
     */
    private $recapService;
    /**
     * @var KapanewonService
     */
    private $service;

    private $categories;

    public function __construct(
        KapanewonRecapitulationService $recapService,
        KapanewonService $service
    ) {
        $this->service = $service;
        $this->recapService = $recapService;
        $this->categories = KapanewonRecapitulationCategory::all();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return inertia('Institutional/KapanewonLayakAnak', [
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

    private function get_recapitulation_by_year(string $category, string $year, string $locationId)
    {
        $timeseries = $this->recapService
            ->whereHas('location')
            ->with('location:id,name')
            ->select([
                'category_id',
                'value',
                'year',
                'location_id',
            ])
            ->where('year', $year)
            ->where('location_id', $locationId)
            ->where('category_id', $category)
            ->first();

        if (is_null($timeseries)) {
            return [
                'year' => $year,
                'value' => 0,
                'location_id' => null,
                'location' => null,
                'category' => $category,
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

        $data->push([
            'key' => count($locations) + 1,
            'location' => config('constants.location')[5],
            'timeseries' => $yearRanges->map(function ($year) {
                $dataByCategory = $this->categories->map(function ($category) use ($year) {
                    $timeseries = $this->recapService
                        ->select(
                            [
                                'year',
                                'value',
                                'category_id',
                            ]
                        )
                        ->where('year', $year)
                        ->where('category_id', $category->id)
                        ->get()->sum('value');

                    return [
                        'year' => $year,
                        'value' => $timeseries,
                        'category' => $category->id,
                    ];
                });
                return $dataByCategory;
            }),
        ]);

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
            'kapanewon_kemantren',
            'kabupaten',
            'tahun',
            'ketua_gugus',
            'no_gugus',
            'profil_anak',
            'forum_anak',
            'ruang_bermain',
            'pusat_informasi',
            'pusat_kreatifitas',
            'satgas_ppa',
            'patbm',
            'pikr',
            'kawasan_tanpa_rokok',
        ];
        $listData = $this->service->api()
            ->defaultSort('created_at')
            ->allowedSorts([
                ...$select,
            ])
            ->allowedFields($select)
            ->select($select)
            ->paginate(request()->query('limit') ?? 10)
            ->appends(request()->query());

        return $listData;
    }

    private function generate_list_column()
    {
        $columns = [
            [
                'title' => 'No',
                'align' => 'center',
                'dataIndex' => 'id',
                'sorter' => true,
            ],
            [
                'title' => 'Kapanewon',
                'align' => 'center',
                'dataIndex' => 'kapanewon_kemantren',
                'sorter' => false,
            ],
            [
                'title' => 'Kabupaten',
                'align' => 'center',
                'dataIndex' => 'kabupaten',
                'sorter' => true,
            ],
            [
                'title' => 'Tahun',
                'align' => 'center',
                'dataIndex' => 'tahun',
                'sorter' => true,
            ],
            [
                'title' => 'Foto',
                'align' => 'center',
                'dataIndex' => 'images_count',
            ],
            [
                'title' => 'Dokumen',
                'align' => 'center',
                'dataIndex' => 'documents_count',
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
         */
        return $categories->map(function ($category) use ($yearRange, $locations) {
            $dataByYear = $yearRange->flatMap(function ($year) use ($locations, $category) {
                return $locations->map(function ($location) use ($year, $category) {
                    $d = $this->recapService
                        ->select([
                            'category_id',
                            'value',
                            'year',
                            'location_id',
                        ])
                        ->where('year', '=', $year)
                        ->where('location_id', '=', $location->id)
                        ->where('category_id', '=', $category->id)
                        ->get();

                    if (is_null($d)) {
                        return 0;
                    }
                    $sumValue = $d->reduce(function ($carry, $item) {
                        return $carry + $item['value'];
                    }, 0);

                    return (int) $sumValue;
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
