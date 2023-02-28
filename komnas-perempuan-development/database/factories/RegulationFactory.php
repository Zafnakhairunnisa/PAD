<?php

namespace Database\Factories;

use App\Domains\Institutional\Models\Regulation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Class RegulationFactory.
 */
class RegulationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Regulation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'year' => $this->faker->year(),
            'rule_type' => $this->faker->randomElement(config('constants.rule_type')),
            'type' => $this->faker->word(5),
            'location_id' => $this->faker->randomElement([1, 2, 3, 4, 5]),
            'created_by' => 1,
        ];
    }
}
