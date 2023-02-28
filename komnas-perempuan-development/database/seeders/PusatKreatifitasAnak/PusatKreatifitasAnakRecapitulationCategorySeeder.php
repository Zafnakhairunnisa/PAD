<?php

namespace Database\Seeders\PusatKreatifitasAnak;

use App\Domains\Cluster4\Models\PusatKreatifitasAnak\PusatKreatifitasAnakRecapitulationCategory;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class PusatKreatifitasAnakRecapitulationCategorySeeder extends Seeder
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
        $this->truncate('pusat_kreatifitas_anak_recapitulation_categories');

        PusatKreatifitasAnakRecapitulationCategory::insert([
            ['name' => 'PKA'],
            ['name' => 'PKA dengan Legalitas'],
            ['name' => 'PKA dengan Papan Nama'],
            ['name' => 'PKA dengan SDM terlatih KHA'],
        ]);

        $this->enableForeignKeys();
    }
}
