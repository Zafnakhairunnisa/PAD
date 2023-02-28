<?php

namespace Database\Factories\Cluster2\ChildWelfareInstitution;

use App\Domains\Cluster2\Models\ChildWelfareInstitution\ChildWelfareInstitutionCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChildWelfareInstitutionCategoryFactory extends Factory
{
    protected $model = ChildWelfareInstitutionCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
        ];
    }
}
