<?php

namespace Database\Factories\Cluster2\ChildFriendlyPlayroom;

use App\Domains\Cluster2\Models\ChildFriendlyPlayroom\ChildFriendlyPlayroomCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChildFriendlyPlayroomCategoryFactory extends Factory
{
    protected $model = ChildFriendlyPlayroomCategory::class;

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
