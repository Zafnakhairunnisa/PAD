<?php

namespace Database\Factories\SatgasPPA;

use App\Domains\Institutional\Models\SatgasPPA;
use Illuminate\Database\Eloquent\Factories\Factory;

class SatgasPPAFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SatgasPPA::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'level' => $this->faker->randomElement([
                'kelurahan',
                'daerah',
                'kabupaten/kota',
                'kapanewon/kemantren',
                'kalurahan/kelurahan',
            ]),
            'kelurahan' => $this->faker->word(),
            'kemantren' => $this->faker->word(),
            'kabupaten' => $this->faker->word(),
            'nomor' => $this->faker->numerify('SK-####'),
        ];
    }
}
