<?php

namespace Database\Seeders\Kejaksaan;

use App\Domains\Cluster5\Models\Kejaksaan\KejaksaanRecapitulationCategory;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class KejaksaanRecapitulationCategorySeeder extends Seeder
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
        $this->truncate('polisi_diy_recapitulation_categories');

        KejaksaanRecapitulationCategory::insert([
            ['name' => 'Jaksa Bersertifikat Penanganan Anak Berhadapan dengan Hukum'],
            ['name' => 'Jaksa Mendapat pelatihan Perlindungan Anak'],
            ['name' => 'Jaksa mendapat pelatihan SPPA'],
            ['name' => 'Jaksa mengikuti pelatihan tentang PP No. 43 Tahun 2017 tentang Restitusi bagi anak yang menjadi korban tindak pidana'],
            ['name' => 'Jumlah Jaksa Penyidik Anak'],
        ]);

        $this->enableForeignKeys();
    }
}
