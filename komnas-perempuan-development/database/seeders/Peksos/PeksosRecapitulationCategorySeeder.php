<?php

namespace Database\Seeders\Peksos;

use App\Domains\Cluster5\Models\Peksos\PeksosRecapitulationCategory;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class PeksosRecapitulationCategorySeeder extends Seeder
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

        PeksosRecapitulationCategory::insert([
            ['name' => 'Peksos Bersertifikat Penanganan Anak Berhadapan dengan Hukum'],
            ['name' => 'Peksos mendapat pelatihan Perlindungan Anak'],
            ['name' => 'Peksos mendapat pelatihan SPPA'],
            ['name' => 'Peksos mengikuti pelatihan tentang PP No. 43 Tahun 2017 tentang Restitusi bagi anak yang menjadi korban tindak pidana'],
            ['name' => 'Jumlah Peksos Penyidik Anak'],
        ]);

        $this->enableForeignKeys();
    }
}
