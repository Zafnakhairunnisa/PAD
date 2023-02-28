<?php

namespace Database\Seeders\Kelurahan;

use App\Domains\Institutional\Models\Kelurahan\KelurahanRecapitulationCategory;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class KelurahanRecapitulationCategorySeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate('kelurahan_recapitulation_categories');

        KelurahanRecapitulationCategory::insert([
            ['name' => 'Kalurahan / Kelurahan'],
            ['name' => 'Kapanewon / Kemantren'],
            ['name' => 'Gugus Tugas'],
            ['name' => 'Profil Anak'],
            ['name' => 'Forum Anak'],
            ['name' => 'Ruang Bermain Ramah Anak'],
            ['name' => 'Pusat Informasi Sahabat Anak'],
            ['name' => 'Pusat Kreatifitas Anak'],
            ['name' => 'Satgas PPA'],
            ['name' => 'Pusat Kreatifitas Anak'],
            ['name' => 'PATBM'],
            ['name' => 'PIKR'],
            ['name' => 'Kawasan Tanpa Rokok'],
        ]);

        $this->enableForeignKeys();
    }
}
