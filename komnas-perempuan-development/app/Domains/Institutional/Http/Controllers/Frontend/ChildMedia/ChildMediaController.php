<?php

namespace App\Domains\Institutional\Http\Controllers\Frontend\ChildMedia;

use App\Domains\Institutional\Services\ChildMedia\ChildMediaRecapitulationService;
use App\Domains\Institutional\Services\ChildMedia\ChildMediaService;
use App\Models\Traits\ImageAndDocument;
use App\Models\Traits\LocationTrait;
use Inertia\Inertia;
use Spatie\QueryBuilder\AllowedSort;

/**
 * Class ChildMediaController.
 */
class ChildMediaController
{
    use LocationTrait, ImageAndDocument;

    /**
     * @var ChildMediaService
     */
    private $service;

    /**
     * @var ChildMediaRecapitulationService
     */
    private $recapitulationService;

    public function __construct(
        ChildMediaService $service,
        ChildMediaRecapitulationService $recapitulationService
    ) {
        $this->service = $service;
        $this->recapitulationService = $recapitulationService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return inertia('Institutional/ChildMedia', [
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
                'value',
                'location_id',
            ])
            ->where('year', $year)
            ->where('location_id', $locationId)
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
            $dataEveryYear = $yearRanges->map(function ($year, $yearIndex) use ($location) {
                return $this->get_recapitulation_by_year($year, $location->id);
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
                $timeseries = $this->recapitulationService
                    ->select(
                        [
                            'year',
                            'value',
                        ]
                    )
                    ->where('year', $year)
                    ->get()->sum('value');

                return [
                    'year' => $year,
                    'value' => $timeseries,
                ];
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
                        'title' => 'Jumlah Media',
                        'align' => 'right',
                        'dataIndex' => ['timeseries', $yearIndex, 'value'],
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
            'nama',
            'jenis_media_id',
            'alamat',
            'kalurahan',
            'kapanewon',
            'kabupaten',
            'media_sosial',
            'nomor_telepon',
            'nama_pimpinan',
            'nama_acara',
            'slug',
        ];
        $listData = $this->service->api()
            ->whereHas('mediaType')
            ->defaultSort('-created_at')
            ->allowedSorts([
                ...$select,
                AllowedSort::field('media_type', 'jenis_media_id'),
            ])
            ->allowedFields($select)
            ->select($select)
            ->with('mediaType:id,name')
            ->withCount(['images', 'documents'])
            ->paginate(request()->query('limit') ?? 10)
            ->appends(request()->query());

        return $listData;
    }

    private function generate_list_column()
    {
        $columns = [
            [
                'title' => 'Nama Media',
                'align' => 'center',
                'dataIndex' => 'nama',
                'sorter' => true,
            ],
            [
                'title' => 'Jenis Media',
                'align' => 'center',
                'dataIndex' => 'media_type',
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
                'dataIndex' => 'kabupaten',
                'sorter' => true,
            ],
            [
                'title' => 'Media Sosial',
                'align' => 'center',
                'dataIndex' => 'media_sosial',
                'sorter' => true,
            ],
            [
                'title' => 'Nomor Telepon',
                'align' => 'center',
                'dataIndex' => 'nomor_telepon',
                'sorter' => true,
            ],
            [
                'title' => 'Nama Pimpinan',
                'align' => 'center',
                'dataIndex' => 'nama_pimpinan',
                'sorter' => true,
            ],
            [
                'title' => 'Nama Rubrik/Acara',
                'align' => 'center',
                'dataIndex' => 'nama_acara',
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
        $categories = collect([
            [
                'name' => 'Jumlah Media',
                'key' => 'value',
            ]
        ]);

        return $categories->map(function ($category) use ($yearRange, $locations) {
            $dataByYear = $yearRange->flatMap(function ($year) use ($locations, $category) {
                return $locations->map(function ($location) use ($year, $category) {
                    $d = $this->recapitulationService
                        ->select([
                            'year',
                            'value',
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
