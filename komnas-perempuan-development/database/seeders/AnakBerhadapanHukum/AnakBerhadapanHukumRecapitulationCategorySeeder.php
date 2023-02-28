<?php

namespace Database\Seeders\AnakBerhadapanHukum;

use App\Domains\Cluster5\Models\AnakBerhadapanHukum\AnakBerhadapanHukumRecapitulationCategory;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class AnakBerhadapanHukumRecapitulationCategorySeeder extends Seeder
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
        $this->truncate('anak_berhadapan_hukum_recapitulation_categories');

        AnakBerhadapanHukumRecapitulationCategory::insert([
            ['name' => 'ABH Korban'],
            ['name' => 'ABH Pelaku'],
            ['name' => 'ABH Berhasil Diversi Penyidikan'],
            ['name' => 'ABH Berhasil Diversi Penuntutan'],
            ['name' => 'ABH Berhasil Diversi Persidangan'],
            ['name' => 'ABH Berhasil Diversi'],
            ['name' => 'ABH Gagal Diversi'],
            ['name' => 'ABH Vonis  < 3 tahun'],
            ['name' => 'ABH Vonis  >3-5 tahun'],
            ['name' => 'ABH Vonis  >5-7 tahun'],
        ]);

        $this->enableForeignKeys();
    }
}
