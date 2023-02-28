<?php

namespace Database\Factories\Cluster4\PusatKreatifitasAnak;

use App\Domains\Cluster4\Models\PusatKreatifitasAnak\PusatKreatifitasAnakRecapitulation;
use Illuminate\Database\Eloquent\Factories\Factory;

class PusatKreatifitasAnakRecapitulationFactory extends Factory
{
    protected $model = PusatKreatifitasAnakRecapitulation::class;

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
            'gender' => $this->faker->randomElement(['l', 'p']),
            'location_id' => $this->faker->numberBetween(1, 4),
            'category_id' => $this->faker->numberBetween(1, 4),
        ];
    }
}
