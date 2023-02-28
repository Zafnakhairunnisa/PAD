<?php

namespace Database\Factories\Cluster2\ChildWelfareInstitution;

use App\Domains\Cluster2\Models\ChildWelfareInstitution\ChildWelfareInstitution;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChildWelfareInstitutionFactory extends Factory
{
    protected $model = ChildWelfareInstitution::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'alamat' => $this->faker->words(),
            'kalurahan' => $this->faker->city(),
            'kapanewon' => $this->faker->city(),
            'location_id' => $this->faker->randomElement([
                1,
                2,
                3,
                4,
                5,
            ]),
            'sertifikasi' => $this->faker->randomElement(['yes', 'no']),
            'jenis' => $this->faker->randomElement(['dalam_ruang', 'luar_ruang']),
            'fasilitas' => $this->faker->word(),
        ];
    }
}
