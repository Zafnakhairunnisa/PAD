<?php

namespace Database\Factories\Cluster3\MedicalFacility;

use App\Domains\Cluster3\Models\MedicalFacility\MedicalFacility;
use Illuminate\Database\Eloquent\Factories\Factory;

class MedicalFacilityFactory extends Factory
{
    protected $model = MedicalFacility::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'no_telepon' => $this->faker->phoneNumber(),
            'lembaga' => $this->faker->company(),
        ];
    }
}
