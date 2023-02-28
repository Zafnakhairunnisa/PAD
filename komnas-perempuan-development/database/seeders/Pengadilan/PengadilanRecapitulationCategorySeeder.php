<?php

namespace Database\Seeders\Pengadilan;

use App\Domains\Cluster5\Models\Pengadilan\PengadilanRecapitulationCategory;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class PengadilanRecapitulationCategorySeeder extends Seeder
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
        $this->truncate('pengadilan_recapitulation_categories');

        PengadilanRecapitulationCategory::insert([
            ['name' => 'Hakim Bersertifikat Penangan Anak Berhadapan dengan Hukum'],
            ['name' => 'Hakim mendapat pelatihan Perlindungan Anak'],
            ['name' => 'Hakim mendapat pelatihan SPPA'],
            ['name' => 'Hakim mengikuti pelatihan tentang PP No. 43 tahun 2017 tentang Restitusi bagi anak yang menjadi korban tindak pidana'],
            ['name' => 'Jumlah Hakim Penyidik Anak'],
        ]);

        $this->enableForeignKeys();
    }
}
