<?php

namespace Database\Factories\Cluster4\PusatKreatifitasAnak;

use App\Domains\Cluster3\Models\PusatKreatifitasAnak\PusatKreatifitasAnakRecapitulationCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class PusatKreatifitasAnakRecapitulationCategoryFactory extends Factory
{
    protected $model = PusatKreatifitasAnakRecapitulationCategory::class;

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
