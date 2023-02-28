<?php

namespace Database\Factories\Cluster4\RumahIbadahRamahAnak;

use App\Domains\Cluster3\Models\RumahIbadahRamahAnak\RumahIbadahRamahAnakRecapitulationCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class PusatKreatifitasAnakRecapitulationCategoryFactory extends Factory
{
    protected $model = RumahIbadahRamahAnakRecapitulationCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
        ];
    }
}
