<?php

namespace Database\Factories\Cluster4\RumahIbadahRamahAnak;

use App\Domains\Cluster4\Models\RumahIbadahRamahAnak\RumahIbadahRamahAnak;
use Illuminate\Database\Eloquent\Factories\Factory;

class PusatKreatifitasAnakFactory extends Factory
{
    protected $model = RumahIbadahRamahAnak::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'jenis' => $this->faker->name(),
            'alamat' => $this->faker->address(),
            'kalurahan' => $this->faker->address(),
            'kapanewon' => $this->faker->address(),
            'location_id' => $this->faker->numberBetween(1, 4),
            'ruang_bermain' => $this->faker->name(),
            'pojok_bacaan' => $this->faker->name(),
            'kawasan_tanpa_rokok' => $this->faker->name(),
            'layanan_ramah_anak' => $this->faker->name(),
            'kegiatan_kreatif' => $this->faker->name(),
        ];
    }
}
