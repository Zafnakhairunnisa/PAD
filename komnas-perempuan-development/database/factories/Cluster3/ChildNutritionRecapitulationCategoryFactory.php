<?php

namespace Database\Factories\Cluster3;

use App\Domains\Cluster3\Models\ChildNutrition\ChildNutritionRecapitulationCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChildNutritionRecapitulationCategoryFactory extends Factory
{
    protected $model = ChildNutritionRecapitulationCategory::class;

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
