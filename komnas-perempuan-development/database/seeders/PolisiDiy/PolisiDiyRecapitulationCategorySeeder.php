<?php

namespace Database\Seeders\PolisiDiy;

use App\Domains\Cluster5\Models\PolisiDiy\PolisiDiyRecapitulationCategory;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class PolisiDiyRecapitulationCategorySeeder extends Seeder
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

        PolisiDiyRecapitulationCategory::insert([
            ['name' => 'Polisi Bersertifikat Penanganan Anak Berhadapan dengan Hukum'],
            ['name' => 'Polisi Mendapatakan Pelatihan Perlindungan Anak'],
            ['name' => 'Polisi Mendapatkan pelatihan SPPA'],
            ['name' => 'Polisi Mengikuti pelatihan tentang PP No. 43 tahun 2017 tentang Restitusi bagi anak yang menjadi korban tindak pidana'],
            ['name' => 'Jumlah Polisi Penyidik Anak'],
        ]);

        $this->enableForeignKeys();
    }
}
