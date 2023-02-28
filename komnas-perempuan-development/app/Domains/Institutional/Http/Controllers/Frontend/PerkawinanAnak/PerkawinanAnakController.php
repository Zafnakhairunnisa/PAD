<?php

namespace App\Domains\Institutional\Http\Controllers\Frontend\PerkawinanAnak;

use App\Domains\Cluster2\Services\PerkawinanAnak\PerkawinanAnakService;
use App\Models\Traits\LocationTrait;
use Inertia\Inertia;

/**
 * Class PerkawinanAnakController.
 */
class PerkawinanAnakController
{
    use LocationTrait;

    /**
     * @var PerkawinanAnakService
     */
    private $service;

    private $categories;

    public function __construct(
        PerkawinanAnakService $service
        ) {
        $this->service = $service;
        $this->categories = collect(config('constants.perkawinan_anak_category'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return inertia('Cluster2/PerkawinanAnak', [
            'recapitulation' => [
                'columns' => Inertia::lazy(fn () => $this->generate_recapitulation_column()),
                'data' => $this->generate_recapitulation_data(),
            ],
            'chart_data' => $this->generate_chart_data(),
        ]);
    }

    private function get_recapitulation_by_year(string $category, string $gender, string $year, string $locationId)
    {
        $timeseries = $this->service
            ->whereHas('location')
            ->with('location:id,name')
            ->select([
                'category',
                'gender',
                'value',
                'year',
                'location_id',
            ])
            ->where('year', $year)
            ->where('gender', $gender)
            ->where('location_id', $locationId)
            ->where('category', $category)
            ->first();

        if (is_null($timeseries)) {
            return [ 
                'year' => $year,
                'value' => 0,
                'location_id' => null,
                'location' => null,
                'gender' => $gender,
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
                    $dataByGender = collect(['L', 'P'])->map(function ($gender) use ($year, $location, $category) {
                        return $this->get_recapitulation_by_year($category, $gender, $year, $location->id);
                    });
                    $dataByGender->push([
                        'year' => $year,
                        'value' => $dataByGender[0]['value'] + $dataByGender[1]['value'],
                        'location_id' => null,
                        'location' => null,
                        'gender' => 'L+P',
                    ]);
                    
                    return $dataByGender;
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
                        'title' => $category,
                        'align' => 'right',
                        'dataIndex' => ['timeseries', $yearIndex, $categoryIndex, 'value'],
                        'children' => [
                            [
                                'title' => 'L',
                                'align' => 'right',
                                'dataIndex' => ['timeseries', $yearIndex, $categoryIndex, 0, 'value'],
                            ],
                            [
                                'title' => 'P',
                                'align' => 'right',
                                'dataIndex' => ['timeseries', $yearIndex, $categoryIndex, 1, 'value'],
                            ],
                            [
                                'title' => 'L + P',
                                'align' => 'right',
                                'dataIndex' => ['timeseries', $yearIndex, $categoryIndex, 2, 'value'],
                            ],
                        ],
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

    private function generate_series_data($categories)
    {
        $yearRange = yearRange();
        $locations = $this->get_locations();

        /**
         * TODO:
         * + Refactoring
         * - This solution is not really good enough we need another solution
         */
        return $this->categories->map(function ($category) use ($yearRange, $locations) {
            $dataByYear = $yearRange->flatMap(function ($year) use ($locations, $category) {
                return $locations->map(function ($location) use ($year, $category) {
                    $d = $this->service
                        ->select([
                            'category',
                            'gender',
                            'value',
                            'year',
                            'location_id',
                        ])
                        ->where('year', '=', $year)
                        ->where('location_id', '=', $location->id)
                        ->where('category', '=', $category)
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
