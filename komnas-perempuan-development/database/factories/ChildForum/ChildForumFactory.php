<?php

namespace Database\Factories\ChildForum;

use App\Domains\Institutional\Models\ChildForum;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChildForumFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ChildForum::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'tingkat' => $this->faker->randomElement([
                'Provinsi',
                'Kabupaten / Kota',
                'Kapanewon / Kemantren',
                'Kalurahan / Kelurahan',
                'Dusun',
            ]),
            'surat_keputusan' => $this->faker->numerify('SK-####'),
            'waktu_pembentukan' => $this->faker->numberBetween(2018, 2022),
            'nama_ketua' => $this->faker->name(),
            'nomor_telepon' => $this->faker->phoneNumber(),
            'alamat' => $this->faker->address(),
            'kalurahan' => 'Tamantirto',
            'kapanewon' => 'Kasihan',
            'kabupaten' => 'Bantul',
            'media_sosial' => '-',
            'pelatihan_kha' => $this->faker->randomElement(['sudah', 'belum']),
            'partisipasi_musrenbang' => $this->faker->randomElement(['sudah', 'belum']),
            'kegiatan' => '',
            'prestasi' => '',
        ];
    }
}
