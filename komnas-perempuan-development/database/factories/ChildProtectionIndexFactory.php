<?php

namespace Database\Factories;

use App\Domains\Institutional\Models\ChildProtectionIndex;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChildProtectionIndexFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ChildProtectionIndex::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category' => $this->faker->randomElement(config('constants.child_protection_indices_category')),
            'year' => $this->faker->year(),
            'value' => $this->faker->randomDigit(),
            'rank' => $this->faker->randomDigitNotZero(),
            'location_id' => $this->faker->randomElement([1, 2, 3, 4, 5]),
            'created_by' => 1,
        ];
    }
}
