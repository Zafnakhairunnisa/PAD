<?php

namespace Database\Factories\ChildMedia;

use App\Domains\Institutional\Models\ChildMedia;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChildMediaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ChildMedia::class;

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
            'jenis_media' => $this->faker->randomElement([
                'radio',
                'televisi',
                'suratkabar',
                'majalah',
            ]),
            'alamat' => $this->faker->address(),
            'kalurahan' => 'Tamantirto',
            'kapanewon' => 'Kasihan',
            'kabupaten' => 'Bantul',
            'media_sosial' => '-',
            'nomor_telepon' => $this->faker->phoneNumber(),
            'nama_pimpinan' => $this->faker->name(),
            'nama_acara' => $this->faker->words(),
        ];
    }
}
