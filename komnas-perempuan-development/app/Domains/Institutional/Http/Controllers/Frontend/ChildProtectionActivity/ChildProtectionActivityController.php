<?php

namespace App\Domains\Institutional\Http\Controllers\Frontend\ChildProtectionActivity;

use App\Domains\Institutional\Services\ChildProtectionActivityRecapitulationService;
use App\Domains\Institutional\Services\ChildProtectionActivityService;
use App\Models\Traits\ImageAndDocument;
use App\Models\Traits\LocationTrait;
use Spatie\QueryBuilder\AllowedSort;

/**
 * Class ChildProtectionActivityController.
 */
class ChildProtectionActivityController
{
    use ImageAndDocument, LocationTrait;

    /**
     * @var ChildProtectionActivityService
     */
    private $service;

    /**
     * @var ChildProtectionActivityRecapitulationService
     */
    private $recapitulationService;

    public function __construct(
        ChildProtectionActivityService $service,
        ChildProtectionActivityRecapitulationService $recapitulationService
    ) {
        $this->service = $service;
        $this->recapitulationService = $recapitulationService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return inertia('Institutional/ChildProtectionActivity', [
            'data' => $this->generate_daftar_data(),
            'recapitulation' => [
                'columns' => $this->generate_recapitulation_column(),
                'data' => $this->generate_recapitulation_data(),
            ],
            'chart_data' => $this->generate_chart_data(),
        ]);
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
                        'title' => 'Jumlah Lembaga',
                        'align' => 'right',
                        'dataIndex' => ['timeseries', $yearIndex, 'company_count'],
                    ],
                    [
                        'title' => 'Sumber Dana APBD',
                        'align' => 'right',
                        'dataIndex' => ['timeseries', $yearIndex, 'source_of_fund_apbd'],
                    ],
                    [
                        'title' => 'Sumber Dana CSR/ZIS',
                        'align' => 'right',
                        'dataIndex' => ['timeseries', $yearIndex, 'source_of_fund_csr'],
                    ],
                    [
                        'title' => 'Jumlah Anggaran',
                        'align' => 'right',
                        'dataIndex' => ['timeseries', $yearIndex, 'budget'],
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

    public function generate_recapitulation_data()
    {
        $yearRanges = yearRange();
        $locations = $this->get_locations();

        $data = $locations->map(function ($location) use ($yearRanges) {
            $dataEveryYear = $yearRanges->map(function ($year) use ($location) {
                $timeseries = $this->recapitulationService
                    ->whereHas('location')
                    ->with('location:id,name')
                    ->select([
                        'year',
                        'source_of_fund_apbd',
                        'source_of_fund_csr',
                        'company_count',
                        'location_id',
                    ])
                    ->where('year', $year)
                    ->where('location_id', $location->id)
                    ->first();

                if (is_null($timeseries)) {
                    return [
                        'year' => $year,
                        'company_count' => 0,
                        'source_of_fund_apbd' => 0,
                        'source_of_fund_csr' => 0,
                        'location_id' => null,
                        'location' => null,
                    ];
                }

                return $timeseries;
            })
                ->map(function ($data) {
                    $data = collect($data);
                    $budget = $data['source_of_fund_apbd'] + $data['source_of_fund_csr'];

                    if ($data['source_of_fund_apbd'] > 0) {
                        $data['source_of_fund_apbd'] = 'Rp. ' . formatCurrency($data['source_of_fund_apbd']);
                    }

                    if ($data['source_of_fund_csr'] > 0) {
                        $data['source_of_fund_csr'] = 'Rp. ' . formatCurrency($data['source_of_fund_csr']);
                    }

                    if ($budget > 0) {
                        $budget = 'Rp. ' . formatCurrency($budget);
                    }

                    return $data
                        ->merge(['budget' => $budget])
                        ->toArray();
                });

            return [
                'key' => $location->id,
                'location' => $location->name,
                'timeseries' => $dataEveryYear,
            ];
        });

        return $data;
    }

    private function generate_daftar_data()
    {
        $daftarData = $this->service->api()
            ->defaultSort('created_at')
            ->allowedSorts(
                'company_name',
                AllowedSort::field('source_of_fund', 'source_of_fund_id'),
                'activity_name',
                AllowedSort::field('activity_type', 'activity_type_id'),
                'target',
                'budget',
                'year',
                AllowedSort::field('location', 'location_id')
            )
            ->allowedFields([
                'id',
                'company_name',
                'source_of_fund_id',
                'activity_name',
                'activity_type_id',
                'target',
                'budget',
                'year',
                'location_id',
            ])
            ->select([
                'id',
                'company_name',
                'source_of_fund_id',
                'activity_name',
                'activity_type_id',
                'target',
                'budget',
                'year',
                'location_id',
                'slug',
            ])
            ->whereHas('location')
            ->with('location:id,name')
            ->with('source_of_fund:id,name')
            ->with('activity_type:id,name')
            ->withCount(['images', 'documents'])
            ->paginate(request()->query('limit') ?? 10)
            ->appends(request()->query());

        return $daftarData;
    }

    private function generate_series_data($categories)
    {
        $yearRange = yearRange();
        $locations = $this->get_locations();
        $categories = collect([
            [
                'name' => 'Lembaga',
                'key' => 'company_count',
            ],
            [
                'name' => 'Sumber Dana APBD',
                'key' => 'source_of_fund_apbd',
            ],
            [
                'name' => 'Sumber Dana CSR/ZIS',
                'key' => 'source_of_fund_csr',
            ],
        ]);

        return $categories->map(function ($category) use ($yearRange, $locations) {
            $dataByYear = $yearRange->flatMap(function ($year) use ($locations, $category) {
                return $locations->map(function ($location) use ($year, $category) {
                    $d = $this->recapitulationService
                        ->select([
                            'company_count',
                            'source_of_fund_apbd',
                            'source_of_fund_csr',
                            'budget_amount',
                            'year',
                            'location_id',
                        ])
                        ->where('year', '=', $year)
                        ->where('location_id', '=', $location->id)
                        ->first()
                        ->{$category['key']} ?? 0;

                    if ($category['key'] !== 'company_count') {
                        return formatCurrency($d);
                    }

                    return (int) $d;
                });
            });

            return [
                'name' => $category['name'],
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
        $recapitulationCategories = collect(['Lembaga', 'Sumber Dana APBD', 'Sumber Dana CSR/ZIR']);

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
