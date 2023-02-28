<?php

namespace App\Domains\Institutional\Http\Controllers\Frontend\SatgasPPA;

use App\Domains\Institutional\Services\SatgasPPA\SatgasPPARecapitulationService;
use App\Domains\Institutional\Services\SatgasPPA\SatgasPPAService;
use App\Models\Traits\LocationTrait;
use Inertia\Inertia;

/**
 * Class SatgasPPAController.
 */
class SatgasPPAController
{
    use LocationTrait;

    /**
     * @var SatgasPPAService
     */
    private $service;

    /**
     * @var SatgasPPARecapitulationService
     */
    private $recapitulationService;

    public function __construct(
        SatgasPPAService $service,
        SatgasPPARecapitulationService $recapitulationService
    ) {
        $this->service = $service;
        $this->recapitulationService = $recapitulationService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return inertia('Institutional/SatgasPPA', [
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

    private function get_recapitulation_by_year(string $year, string $locationId)
    {
        $timeseries = $this->recapitulationService
            ->whereHas('location')
            ->with('location:id,name')
            ->select([
                'year',
                'value_diy',
                'value_kabupaten',
                'value_kapanewon',
                'value_kalurahan',
                'location_id',
            ])
            ->where('year', $year)
            ->where('location_id', $locationId)
            ->first();

        if (is_null($timeseries)) {
            return [
                'year' => $year,
                'value_diy' => 0,
                'value_kabupaten' => 0,
                'value_kapanewon' => 0,
                'value_kalurahan' => 0,
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
                return $this->get_recapitulation_by_year($year, $location->id);
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
                'children' => [
                    [
                        'title' => 'Daerah Istimewa Yogyakarta',
                        'align' => 'right',
                        'dataIndex' => ['timeseries', $yearIndex, 'value_diy'],
                    ],
                    [
                        'title' => 'Kabupaten / Kota',
                        'align' => 'right',
                        'dataIndex' => ['timeseries', $yearIndex, 'value_kabupaten'],
                    ],
                    [
                        'title' => 'Kapanewon / Kemantren',
                        'align' => 'right',
                        'dataIndex' => ['timeseries', $yearIndex, 'value_kapanewon'],
                    ],
                    [
                        'title' => 'Kalurahan / Kelurahan',
                        'align' => 'right',
                        'dataIndex' => ['timeseries', $yearIndex, 'value_kalurahan'],
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

    private function generate_list_data()
    {
        $select = [
            'id',
            'name',
            'phone',
            'level',
            'kelurahan',
            'kemantren',
            'kabupaten',
            'nomor',
            'slug',
        ];
        $listData = $this->service->api()
            ->defaultSort('created_at')
            ->allowedSorts($select)
            ->allowedFields($select)
            ->select($select)
            ->withCount(['images', 'documents'])
            ->paginate(request()->query('limit') ?? 10)
            ->appends(request()->query());

        return $listData;
    }

    private function generate_list_column()
    {
        $columns = [
            [
                'title' => 'Nama Satgas',
                'align' => 'center',
                'dataIndex' => 'name',
                'sorter' => true,
            ],
            [
                'title' => 'Nomor Telepon',
                'align' => 'center',
                'dataIndex' => 'phone',
                'sorter' => true,
            ],
            [
                'title' => 'Tingkatan Satgas PPA',
                'align' => 'center',
                'dataIndex' => 'level',
                'sorter' => true,
            ],
            [
                'title' => 'Kalurahan / Kelurahan',
                'align' => 'center',
                'dataIndex' => 'kelurahan',
                'sorter' => true,
            ],
            [
                'title' => 'Kapanewon / Kemantren',
                'align' => 'center',
                'dataIndex' => 'kemantren',
                'sorter' => true,
            ],
            [
                'title' => 'Kabupaten / Kota',
                'align' => 'center',
                'dataIndex' => 'kabupaten',
                'sorter' => true,
            ],
            [
                'title' => 'SK Satgas',
                'align' => 'center',
                'dataIndex' => 'nomor',
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

    private function generate_series_data($categories)
    {
        $yearRange = yearRange(true);
        $locations = $this->get_locations();
        $categories = collect([
            [
                'name' => 'Daerah Istimewa Yogyakarta',
                'key' => 'value_diy',
            ],
            [
                'name' => 'Kabupaten / Kota',
                'key' => 'value_kabupaten',
            ],
            [
                'name' => 'Kapanewon / Kemantren',
                'key' => 'value_kapanewon',
            ],
            [
                'name' => 'Kalurahan / Kelurahan',
                'key' => 'value_kalurahan',
            ]
        ]);

        return $categories->map(function ($category) use ($yearRange, $locations) {
            $dataByYear = $yearRange->flatMap(function ($year) use ($locations, $category) {
                return $locations->map(function ($location) use ($year, $category) {
                    $d = $this->recapitulationService
                        ->select([
                            'year',
                            'value_diy',
                            'value_kabupaten',
                            'value_kapanewon',
                            'value_kalurahan',
                            'location_id',
                        ])
                        ->where('year', '=', $year)
                        ->where('location_id', '=', $location->id)
                        ->first()
                        ->{$category['key']} ?? 0;

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
