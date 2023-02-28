<?php

namespace Database\Factories\Cluster4\PusatKreatifitasAnak;

use App\Domains\Cluster4\Models\PusatKreatifitasAnak\PusatKreatifitasAnak;
use Illuminate\Database\Eloquent\Factories\Factory;

class PusatKreatifitasAnakFactory extends Factory
{
    protected $model = PusatKreatifitasAnak::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'bidang' => $this->faker->name(),
            'alamat' => $this->faker->address(),
            'kalurahan' => $this->faker->address(),
            'kapanewon' => $this->faker->address(),
            'location_id' => $this->faker->numberBetween(1, 4),
            'legalitas' => $this->faker->name(),
            'papan_nama' => $this->faker->name(),
            'pelatihan_kha' => $this->faker->name(),
            'kegiatan' => $this->faker->name(),
            'prestasi' => $this->faker->name(),
        ];
    }
}
