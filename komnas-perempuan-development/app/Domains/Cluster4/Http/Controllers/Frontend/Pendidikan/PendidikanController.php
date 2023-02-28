<?php

namespace App\Domains\Cluster4\Http\Controllers\Frontend\Pendidikan;

use App\Domains\Cluster3\Models\MedicalFacility\MedicalFacilityRecapitulationCategory;
use App\Domains\Cluster4\Services\Education\EducationRecapitulationService;
use App\Models\Traits\LocationTrait;
use Inertia\Inertia;

/**
 * Class PendidikanController.
 */
class PendidikanController
{
    use LocationTrait;

    /**
     * @var Birth
     */
    private $service;

    /**
     * @var EducationRecapitulationService
     */
    private $recapitulationService;

    private $categories;

    public function __construct(
        EducationRecapitulationService $service
        ) {
        $this->service = $service;
        $this->categories = MedicalFacilityRecapitulationCategory::select('id', 'name')->get();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return inertia('Cluster4/Pendidikan', [
            'recapitulation' => [
                'columns' => Inertia::lazy(fn () => $this->generate_recapitulation_column()),
                'data' => $this->generate_recapitulation_data(),
            ],
        ]);
    }

    private function get_recapitulation_by_year(string $year, string $gender, string $categoryId, string $locationId)
    {
        $timeseries = $this->service
            ->whereHas('location')
            ->whereHas('category')
            ->with('location:id,name')
            ->with('category:id,name')
            ->select([
                'value',
                'year',
                'gender',
                'location_id',
                'category_id',
            ])
            ->where('year', $year)
            ->where('gender', strtolower($gender))
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
                $dataByCategory = $this->categories->map(function ($category) use ($year, $location) {
                    $dataByGender = collect(['L', 'P'])->map(function ($gender) use ($year, $location, $category) {
                        return $this->get_recapitulation_by_year($year, $gender, $category->id, $location->id);
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
                        'title' => $category->name,
                        'align' => 'right',
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
}
