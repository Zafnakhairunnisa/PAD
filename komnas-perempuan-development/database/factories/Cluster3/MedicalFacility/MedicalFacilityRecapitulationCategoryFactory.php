<?php

namespace Database\Factories\Cluster3\MedicalFacility;

use App\Domains\Cluster3\Models\MedicalFacility\MedicalFacilityRecapitulationCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class MedicalFacilityRecapitulationCategoryFactory extends Factory
{
    protected $model = MedicalFacilityRecapitulationCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
        ];
    }
}
