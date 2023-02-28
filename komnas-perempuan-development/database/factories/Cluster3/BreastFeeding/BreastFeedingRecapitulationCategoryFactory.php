<?php

namespace Database\Factories\Cluster3\BreastFeeding;

use App\Domains\Cluster3\Models\BreastFeeding\BreastFeedingRecapitulationCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class BreastFeedingRecapitulationCategoryFactory extends Factory
{
    protected $model = BreastFeedingRecapitulationCategory::class;

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
