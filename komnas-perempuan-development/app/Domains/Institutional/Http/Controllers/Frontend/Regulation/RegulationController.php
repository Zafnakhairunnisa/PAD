<?php

namespace App\Domains\Institutional\Http\Controllers\Frontend\Regulation;

use App\Domains\Institutional\Services\RegulationRecapitulationService;
use App\Domains\Institutional\Services\RegulationService;
use App\Models\Traits\LocationTrait;
use Inertia\Inertia;
use Spatie\QueryBuilder\AllowedSort;

/**
 * Class RegulationController.
 */
class RegulationController
{
    use LocationTrait;

    /**
     * @var RegulationService
     */
    private $service;

    /**
     * @var ChildWelfareInstitutionRecapitulationService
     */
    private $recapitulationService;

    private $categories;

    public function __construct(
        RegulationService $regulationService,
        RegulationRecapitulationService $recapitulationService
    ) {
        $this->service = $regulationService;
        $this->recapitulationService = $recapitulationService;
        $this->categories = collect(config('constants.recapitulation_category'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return inertia('Institutional/Regulation', [
            'recapitulation' => [
                'columns' => Inertia::lazy(fn () => $this->generate_recapitulation_column()),
                'data' => $this->generate_recapitulation_data(),
            ],
            'list_data' => [
                'columns' => Inertia::lazy(fn () => $this->generate_list_column()),
                'data' => Inertia::lazy(fn () => $this->generate_list_data()),
            ],
            'chart_data' => $this->generate_chart_data(),
        ]);
    }

    private function get_recapitulation_by_year(string $category, string $year, string $locationId)
    {
        $timeseries = $this->recapitulationService
            ->whereHas('location')
            ->with('location:id,name')
            ->select([
                'category',
                'value',
                'year',
                'location_id',
            ])
            ->where('year', $year)
            ->where('location_id', $locationId)
            ->where('category', $category)
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
                    return $this->get_recapitulation_by_year($category, $year, $location->id);
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
                    $timeseries = $this->recapitulationService
                        ->select(
                            [
                                'year',
                                'value',
                                'category',
                            ]
                        )
                        ->where('year', $year)
                        ->where('category', $category)
                        ->get()->sum('value');

                    return [
                        'year' => $year,
                        'value' => $timeseries,
                        'category' => $category,
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
                        'title' => $category,
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
            'name',
            'year',
            'rule_type',
            'type',
            'location_id',
            'slug',
        ];
        $listData = $this->service->api()
            ->whereHas('location')
            ->defaultSort('-created_at')
            ->allowedSorts([
                ...$select,
                AllowedSort::field('location', 'location_id'),
            ])
            ->allowedFields($select)
            ->select($select)
            ->with('location:id,name')
            ->withCount(['images', 'documents'])
            ->paginate(request()->query('limit') ?? 10)
            ->appends(request()->query());

        return $listData;
    }

    private function generate_list_column()
    {
        $columns = [
            [
                'title' => 'Wilayah',
                'align' => 'center',
                'fixed' => 'left',
                'dataIndex' => 'location',
            ],
            [
                'title' => 'Nama Peraturan',
                'align' => 'center',
                'dataIndex' => 'name',
                'sorter' => true,
            ],
            [
                'title' => 'Tahun',
                'align' => 'center',
                'dataIndex' => 'year',
                'sorter' => true,
            ],
            [
                'title' => 'Jenis Peraturan / Kebijakan',
                'align' => 'center',
                'dataIndex' => 'rule_type',
                'sorter' => true,
            ],
            [
                'title' => 'Macam Peraturan / Kebijakan',
                'align' => 'center',
                'dataIndex' => 'type',
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

        return collect($categories)->map(function ($category) use ($yearRange, $locations) {
            $dataByYear = $yearRange->flatMap(function ($year) use ($category, $locations) {
                return $locations->map(function ($location) use ($year, $category) {
                    $d = $this->recapitulationService
                        ->select(['id', 'year', 'category', 'value', 'location_id'])
                        ->with('location:id,name')
                        ->where('year', '=', $year)
                        ->where('category', '=', $category)
                        ->where('location_id', '=', $location->id)
                        ->first()
                        ->value ?? 0;

                    return (int) $d;
                });
            });

            return [
                'name' => $category,
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
        $recapitulationCategories = config('constants.recapitulation_category');

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

    public function document(string $slug)
    {
        $documents = $this->service->documents($slug);

        return inertia('Document', [
            'documents' => $documents,
        ]);
    }

    public function image(string $slug)
    {
        $images = $this->service->images($slug);

        return inertia('Photo', [
            'images' => $images,
        ]);
    }
}
