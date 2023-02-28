<?php

namespace Database\Factories\Cluster4\RumahIbadahRamahAnak;

use App\Domains\Cluster4\Models\RumahIbadahRamahAnak\RumahIbadahRamahAnakRecapitulation;
use Illuminate\Database\Eloquent\Factories\Factory;

class PusatKreatifitasAnakRecapitulationFactory extends Factory
{
    protected $model = RumahIbadahRamahAnakRecapitulation::class;

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
