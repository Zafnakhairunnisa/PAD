<?php

namespace Database\Factories\Cluster2\ChildFriendlyPlayroom;

use Illuminate\Database\Eloquent\Factories\Factory;

class ChildFriendlyPlayroomRecapitulationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => $this->faker->randomElement([
                1,
                2,
                3,
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
