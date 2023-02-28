<?php

namespace Database\Factories\Cluster3\MedicalFacility;

use App\Domains\Cluster3\Models\MedicalFacility\MedicalFacilityCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class MedicalFacilityCategoryFactory extends Factory
{
    protected $model = MedicalFacilityCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
        ];
    }
}
