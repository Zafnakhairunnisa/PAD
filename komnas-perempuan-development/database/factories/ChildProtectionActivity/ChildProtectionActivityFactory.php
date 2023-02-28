<?php

namespace Database\Factories\ChildProtectionActivity;

use Illuminate\Database\Eloquent\Factories\Factory;

class ChildProtectionActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_name' => $this->faker->company(),
            'source_of_funds' => '1',
            'activity_name' => $this->faker->text,
            'type' => $this->faker->text,
            'target' => $this->faker->text,
            'budget' => $this->faker->randomFloat(),
            'year' => $this->faker->year(),
            'location_id' => '1',
        ];
    }
}
