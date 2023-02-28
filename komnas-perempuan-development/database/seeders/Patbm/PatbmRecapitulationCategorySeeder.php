<?php

namespace Database\Seeders\Patbm;

use App\Domains\Cluster5\Models\Patbm\PatbmRecapitulationCategory;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class PatbmRecapitulationCategorySeeder extends Seeder
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
        $this->truncate('patbm_recapitulation_categories');

        PatbmRecapitulationCategory::insert([
            ['name' => 'Jumlah Kalurahan / Kelurahan'],
            ['name' => 'Jumlah PATBM'],
        ]);

        $this->enableForeignKeys();
    }
}
