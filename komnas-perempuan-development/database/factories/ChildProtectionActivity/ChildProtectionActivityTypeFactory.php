<?php

namespace Database\Factories\ChildProtectionActivity;

use Illuminate\Database\Eloquent\Factories\Factory;

class ChildProtectionActivityTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
        ];
    }
}
