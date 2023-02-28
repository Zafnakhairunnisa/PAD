<?php

namespace Database\Factories\SatgasPPA;

use App\Domains\Institutional\Models\SatgasPPARecapitulation;
use Illuminate\Database\Eloquent\Factories\Factory;

class SatgasPPARecapitulationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SatgasPPARecapitulation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'value_diy' => $this->faker->numberBetween(1, 10),
            'value_kabupaten' => $this->faker->numberBetween(1, 10),
            'value_kapanewon' => $this->faker->numberBetween(1, 10),
            'value_kalurahan' => $this->faker->numberBetween(1, 10),
            'year' => $this->faker->numberBetween(2018, 2022),
            'location_id' => $this->faker->numberBetween(1, 4),
        ];
    }
}
