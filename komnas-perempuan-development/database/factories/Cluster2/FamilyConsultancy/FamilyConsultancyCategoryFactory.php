<?php

namespace Database\Factories\Cluster2\FamilyConsultancy;

use App\Domains\Cluster2\Models\FamilyConsultancyCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class FamilyConsultancyCategoryFactory extends Factory
{
    protected $model = FamilyConsultancyCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement([
                'Puspaga',
                'LK3',
                'PPKS',
                'Bina Keluarga Remaja',
                'Bina Keluarga Balita',
                'Pusat Informasi dan Konseling Remaja',
                'lain lain',
            ]),
        ];
    }
}
