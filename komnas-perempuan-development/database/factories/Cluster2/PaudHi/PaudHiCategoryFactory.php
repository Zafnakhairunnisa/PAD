<?php

namespace Database\Factories\Cluster2\PaudHi;

use App\Domains\Cluster2\Models\PaudHiCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaudHiCategoryFactory extends Factory
{
    protected $model = PaudHiCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement([
                'PAUD',
                'PAUD HI',
                'Persentase PAUD HI',
            ]),
        ];
    }
}
