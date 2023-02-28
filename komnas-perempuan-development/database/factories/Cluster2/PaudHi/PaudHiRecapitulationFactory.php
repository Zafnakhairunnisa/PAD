<?php

namespace Database\Factories\Cluster2\PaudHi;

use Illuminate\Database\Eloquent\Factories\Factory;

class PaudHiRecapitulationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category' => $this->faker->randomElement([
                'PAUD',
                'PAUD HI',
                'Persentase PAUD HI',
            ]),
            'location_id' => $this->faker->randomElement([
                '1',
                '2',
                '3',
                '4',
            ]),
            'year' => $this->faker->numberBetween([2018, 2022]),
            'value' => $this->faker->numberBetween([0, 100]),
        ];
    }
}
