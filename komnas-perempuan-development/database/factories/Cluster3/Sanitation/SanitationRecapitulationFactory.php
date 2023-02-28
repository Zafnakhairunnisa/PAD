<?php

namespace Database\Factories\Cluster3\Sanitation;

use App\Domains\Cluster3\Models\Sanitation\SanitationRecapitulation;
use Illuminate\Database\Eloquent\Factories\Factory;

class SanitationRecapitulationFactory extends Factory
{
    protected $model = SanitationRecapitulation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'value' => $this->faker->numberBetween(1, 100),
            'year' => $this->faker->numberBetween(2018, 2022),
            'location_id' => $this->faker->numberBetween(1, 4),
            'category_id' => $this->faker->numberBetween(1, 4),
        ];
    }
}
