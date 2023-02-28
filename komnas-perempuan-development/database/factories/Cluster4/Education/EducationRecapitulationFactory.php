<?php

namespace Database\Factories\Cluster4\Education;

use App\Domains\Cluster4\Models\Education\EducationRecapitulation;
use Illuminate\Database\Eloquent\Factories\Factory;

class EducationRecapitulationFactory extends Factory
{
    protected $model = EducationRecapitulation::class;

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
