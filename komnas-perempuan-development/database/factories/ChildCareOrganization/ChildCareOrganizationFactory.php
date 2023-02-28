<?php

namespace Database\Factories\ChildCareOrganization;

use Illuminate\Database\Eloquent\Factories\Factory;

class ChildCareOrganizationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'slug' => \Str::slug($this->faker->name()),
            'location_id' => $this->faker->randomElement([
                '1',
                '2',
                '3',
                '4',
            ]),
            'alamat' => $this->faker->address(),
            'kalurahan' => 'Tamantirto',
            'kapanewon' => 'Kasihan',
            'kabupaten' => 'Bantul',
            'media_sosial' => '-',
            'nomor_telepon' => $this->faker->phoneNumber(),
            'nama_pimpinan' => $this->faker->name(),
            'kegiatan' => $this->faker->words(),
        ];
    }
}
