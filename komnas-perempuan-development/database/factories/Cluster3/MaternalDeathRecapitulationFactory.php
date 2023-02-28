<?php

namespace Database\Factories\Cluster3;

use App\Domains\Cluster3\Models\MaternalDeath\MaternalDeathRecapitulation;
use Illuminate\Database\Eloquent\Factories\Factory;

class MaternalDeathRecapitulationFactory extends Factory
{
    protected $model = MaternalDeathRecapitulation::class;

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
        ];
    }
}
