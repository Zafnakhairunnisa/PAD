<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RegulationRecapitulationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'year' => $this->faker->year(),
            'category' => $this->faker->randomElement([]),
            'location_id' => $this->faker->randomElement(config('constants.location')),
        ];
    }
}
