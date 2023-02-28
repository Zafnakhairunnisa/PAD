<?php

namespace Database\Factories\ChildMedia;

use App\Domains\Institutional\Models\ChildMediaRecapitulation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChildMediaRecapitulationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ChildMediaRecapitulation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'value' => $this->faker->numberBetween(1, 10),
            'year' => $this->faker->numberBetween(2018, 2022),
            'location_id' => $this->faker->numberBetween(1, 4),
        ];
    }
}
