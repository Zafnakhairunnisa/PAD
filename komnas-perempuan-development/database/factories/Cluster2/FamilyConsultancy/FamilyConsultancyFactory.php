<?php

namespace Database\Factories\Cluster2\FamilyConsultancy;

use App\Domains\Cluster2\Models\FamilyConsultancy\FamilyConsultancy;
use Illuminate\Database\Eloquent\Factories\Factory;

class FamilyConsultancyFactory extends Factory
{
    protected $model = FamilyConsultancy::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'kategori_id' => $this->faker->randomElement([
                1,
                2,
                3,
                4,
                5,
            ]),
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
            'media_sosial' => $this->faker->word(),
            'nama_pimpinan' => $this->faker->name(),
            'no_telepon' => $this->faker->phoneNumber(),
            'no_sertifikasi' => $this->faker->word(),
            'kegiatan' => $this->faker->word(),
            'klien' => $this->faker->numberBetween([1, 100]),
            'fasilitas' => $this->faker->word(),
        ];
    }
}
