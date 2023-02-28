<?php

namespace Database\Factories\Cluster3;

use App\Domains\Cluster3\Models\BreastFeeding\BreastFeeding;
use Illuminate\Database\Eloquent\Factories\Factory;

class BreastFeedingFactory extends Factory
{
    protected $model = BreastFeeding::class;

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
