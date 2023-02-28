<?php

namespace App\Domains\Cluster5\Http\Controllers\Frontend\PekerjaAnak;

use App\Domains\Cluster5\Models\PekerjaAnak\PekerjaAnakRecapitulation;
use App\Domains\Cluster5\Services\PekerjaAnak\PekerjaAnakRecapitulationService;
use App\Models\Traits\LocationTrait;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

/**
 * Class PekerjaAnakController.
 */
class PekerjaAnakController
{
    use LocationTrait;

    /**
     * @var PekerjaAnakRecapitulationService
     */
    private $service;

    public function __construct(
        PekerjaAnakRecapitulationService $service
    ) {
        $this->service = $service;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return inertia('Cluster5/PekerjaAnak', [
            'recapitulation' => [
                'columns' => Inertia::lazy(fn () => $this->generate_recapitulation_column()),
                'data' => $this->generate_recapitulation_data(),
            ],
            'chart_data' => $this->generate_chart_data(),
        ]);
    }

    private function get_recapitulation_by_year(string $gender, string $year, string $locationId)
    {
        $timeseries = $this->service
            ->whereHas('location')
            ->with('location:id,name')
            ->select([
                'gender',
                'value',
                'year',
                'location_id',
            ])
            ->where('year', $year)
            ->where('gender', $gender)
            ->where('location_id', $locationId)
            ->first();

        if (is_null($timeseries)) {
            return [
                'year' => $year,
                'value' => 0,
                'location_id' => null,
                'location' => null,
                'gender' => $gender,
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
                $dataByGender = collect(['L', 'P'])->map(function ($gender) use ($year, $location) {
                    return $this->get_recapitulation_by_year($gender, $year, $location->id);
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

            return [
                'key' => $location->id,
                'location' => $location->name,
                'timeseries' => $dataEveryYear,
            ];
        });

        $data->push([
            'key' => count($locations) + 16,
            'location' => config('constants.location')[5],
            'timeseries' => $yearRanges->map(function ($year) {
                $dataByGender = collect(['L', 'P'])->map(function ($gender) use ($year) {
                    $timeseries = $this->service
                        ->select(
                            [
                                'year',
                                'gender',
                                'value'
                            ]
                        )
                        ->where('year', $year)
                        ->where('gender', $gender)
                        ->get()->sum('value');

                    return [
                        'year' => $year,
                        'value' => $timeseries,
                        'gender' => $gender,
                    ];
                });
                $dataByGender->push([
                    'year' => $year,
                    'value' => $dataByGender[0]['value'] + $dataByGender[1]['value'],
                    'gender' => 'L+P',
                ]);
                return $dataByGender;
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
                'children' => [
                    [
                        'title' => 'L',
                        'align' => 'right',
                        'dataIndex' => ['timeseries', $yearIndex, 0, 'value'],
                    ],
                    [
                        'title' => 'P',
                        'align' => 'right',
                        'dataIndex' => ['timeseries', $yearIndex, 1, 'value'],
                    ],
                    [
                        'title' => 'L + P',
                        'align' => 'right',
                        'dataIndex' => ['timeseries', $yearIndex, 2, 'value'],
                    ],
                ],
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
        $yearRange = yearRange(true);
        $locations = $this->get_locations();

        $data = $yearRange->flatMap(function ($y) use ($yearRange, $locations) {
            return $locations->flatMap(function ($location) use ($yearRange, $y, $locations) {
                $dataByYear = $yearRange->flatMap(function ($year) use ($location, $yearRange, $locations) {
                    return $locations->map(function ($loc) use ($yearRange, $location, $year, $locations) {
                        $d = $this->service
                            ->select([
                                'year',
                                'value',
                                'location_id',
                            ])
                            ->where('year', '=', $year)
                            ->where('location_id', '=', $loc->id)
                            ->get()->sum('value');
                        if ($d) {
                            return $d;
                        } else {
                            return 0;
                        }
                    });
                });

                return [
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
        });

        return $data;
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

        $data = [
            'tooltip' => [
                'trigger' => 'item',
                'axisPointer' => [
                    'type' => 'shadow',
                ],
            ],
            'legend' => [
                'type' => 'scroll',
                'data' => $locations,
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
            'series' => $this->generate_series_data($locations),
        ];

        return $data;
    }
}
