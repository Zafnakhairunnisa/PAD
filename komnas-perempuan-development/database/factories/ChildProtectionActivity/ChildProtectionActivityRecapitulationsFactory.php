<?php

namespace Database\Factories\ChildProtectionActivity;

use App\Domains\Institutional\Models\ChildProtectionActivityRecapitulations;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChildProtectionActivityRecapitulationsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ChildProtectionActivityRecapitulations::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_count' => $this->faker->numberBetween(1, 10),
            'source_of_fund_apbd' => $this->faker->numberBetween(5000, 1000000),
            'source_of_fund_csr' => $this->faker->numberBetween(5000, 1000000),
            'year' => $this->faker->year(),
            'budget_amount' => $this->faker->numberBetween(5000, 1000000),
            'location_id' => $this->faker->randomElement(['1', '2', '3', '4', '5']),
        ];
    }
}
