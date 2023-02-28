<?php

namespace App\Domains\Cluster4\Http\Controllers\Frontend\RumahIbadahRamahAnak;

use App\Domains\Cluster4\Models\RumahIbadahRamahAnak\RumahIbadahRamahAnakRecapitulationCategory;
use App\Domains\Cluster4\Services\RumahIbadahRamahAnak\RumahIbadahRamahAnakRecapitulationService;
use App\Domains\Cluster4\Services\RumahIbadahRamahAnak\RumahIbadahRamahAnakService;
use App\Models\Traits\LocationTrait;
use Inertia\Inertia;
use Spatie\QueryBuilder\AllowedSort;

/**
 * Class RumahIbadahRamahAnakController.
 */
class RumahIbadahRamahAnakController
{
    use LocationTrait;

    /**
     * @var PusatKreatifitasAnakService
     */
    private $service;

    /**
     * @var PusatKreatifitasAnakRecapitulationService
     */
    private $recapitulationService;

    private $categories;

    public function __construct(
        RumahIbadahRamahAnakService $service,
        RumahIbadahRamahAnakRecapitulationService $recapitulationService
        ) {
        $this->service = $service;
        $this->recapitulationService = $recapitulationService;
        $this->categories = RumahIbadahRamahAnakRecapitulationCategory::select('id', 'name')->get();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return inertia('Cluster4/RumahIbadahRamahAnak', [
            'recapitulation' => [
                'columns' => Inertia::lazy(fn () => $this->generate_recapitulation_column()),
                'data' => $this->generate_recapitulation_data(),
            ],
            'list_data' => [
                'columns' => Inertia::lazy(fn () => $this->generate_list_column()),
                'data' => $this->generate_list_data(),
            ],
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
            'jenis',
            'alamat',
            'kalurahan',
            'kapanewon',
            'location_id',
            'ruang_bermain',
            'pojok_bacaan',
            'kawasan_tanpa_rokok',
            'layanan_ramah_anak',
            'kegiatan_kreatif',
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
            ->paginate(request()->query('limit') ?? 10)
            ->appends(request()->query());

        return $listData;
    }

    private function generate_list_column()
    {
        $columns = [
            [
                'title' => 'Nama',
                'align' => 'center',
                'dataIndex' => 'nama',
                'sorter' => true,
            ],
            [
                'title' => 'Jenis',
                'align' => 'center',
                'dataIndex' => 'jenis',
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
                'title' => 'Ruang Bermain',
                'align' => 'center',
                'dataIndex' => 'ruang_bermain',
                'sorter' => true,
            ],
            [
                'title' => 'Pusat Informasi Sahabat Anak',
                'align' => 'center',
                'dataIndex' => 'pojok_bacaan',
                'sorter' => true,
            ],
            [
                'title' => 'Kawasan Tanpa Rokok',
                'align' => 'center',
                'dataIndex' => 'kawasan_tanpa_rokok',
                'sorter' => true,
            ],
            [
                'title' => 'Layanan Ramah Anak',
                'align' => 'center',
                'dataIndex' => 'layanan_ramah_anak',
                'sorter' => true,
            ],
            [
                'title' => 'Kegiatan Kreatif',
                'align' => 'center',
                'dataIndex' => 'kegiatan_kreatif',
                'sorter' => true,
            ],
        ];

        return $columns;
    }
}
