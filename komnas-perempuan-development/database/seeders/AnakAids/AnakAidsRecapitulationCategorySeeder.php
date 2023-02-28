<?php

namespace Database\Seeders\AnakAids;

use App\Domains\Cluster5\Models\AnakAids\AnakAidsRecapitulationCategory;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class AnakAidsRecapitulationCategorySeeder extends Seeder
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
        $this->truncate('anak_aids_recapitulation_categories');

        AnakAidsRecapitulationCategory::insert([
            ['name' => 'Jumlah Anak Umur 0-19 tahun Pengindap HIV'],
            ['name' => 'Jumlah Kumulatif Anak Umur 0-19 tahun Pengindap AIDS'],
            ['name' => 'Data Anak Dengan HIV AIDs (ADHA) berdasar Kepala Keluarga'],
            ['name' => 'Data Anak Dengan HIV AIDs (ADHA) berdasar Disabilitas'],
        ]);

        $this->enableForeignKeys();
    }
}
