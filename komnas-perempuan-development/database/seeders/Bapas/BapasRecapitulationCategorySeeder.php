<?php

namespace Database\Seeders\Bapas;

use App\Domains\Cluster5\Models\Bapas\BapasRecapitulationCategory;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class BapasRecapitulationCategorySeeder extends Seeder
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
        $this->truncate('bapas_recapitulation_categories');

        BapasRecapitulationCategory::insert([
            ['name' => 'PK Bersertifikat Penganan Anak Berhadapan dengan Hukum'],
            ['name' => 'PK mendapat pelatihan Perlindungan Anak'],
            ['name' => 'PK mendapat pelatihan SPPA'],
            ['name' => 'PK mengikuti pelatihan tentang PP No. 43 Tahun 2017 tentang Restitusi bagi anak yang menjadi korban tindak pidana'],
            ['name' => 'Jumlah PK Penyidik Anak'],
        ]);

        $this->enableForeignKeys();
    }
}
