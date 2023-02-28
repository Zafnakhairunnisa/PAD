<?php

namespace Database\Factories\Cluster1\ChildIdentityCard;

use Illuminate\Database\Eloquent\Factories\Factory;

class ChildIdentityCardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category' => $this->faker->name(),
            'location_id' => $this->faker->randomElement([
                '1',
                '2',
                '3',
                '4',
            ]),
            'year' => $this->faker->numberBetween([2018, 2022]),
            'gender' => $this->faker->randomElement(['L', 'P']),
            'value' => $this->faker->numberBetween([0, 100]),
        ];
    }
}
