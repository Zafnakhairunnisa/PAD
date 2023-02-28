<?php

namespace Database\Factories\Cluster4\Education;

use App\Domains\Cluster3\Models\Education\EducationRecapitulationCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class EducationRecapitulationCategoryFactory extends Factory
{
    protected $model = EducationRecapitulationCategory::class;

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
