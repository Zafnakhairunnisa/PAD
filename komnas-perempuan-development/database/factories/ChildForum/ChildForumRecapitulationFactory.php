<?php

namespace Database\Factories\ChildForum;

use App\Domains\Institutional\Models\ChildForumRecapitulation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChildForumRecapitulationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ChildForumRecapitulation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'value_diy' => $this->faker->numberBetween(1, 10),
            'value_kabupaten' => $this->faker->numberBetween(1, 10),
            'value_kapanewon' => $this->faker->numberBetween(1, 10),
            'value_kalurahan' => $this->faker->numberBetween(1, 10),
            'year' => $this->faker->numberBetween(2018, 2022),
            'location_id' => $this->faker->numberBetween(1, 4),
        ];
    }
}
