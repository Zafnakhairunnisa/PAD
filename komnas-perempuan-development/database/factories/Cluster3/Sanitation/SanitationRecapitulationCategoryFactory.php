<?php

namespace Database\Factories\Cluster3\Sanitation;

use App\Domains\Cluster3\Models\Sanitation\SanitationRecapitulationCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class SanitationRecapitulationCategoryFactory extends Factory
{
    protected $model = SanitationRecapitulationCategory::class;

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
