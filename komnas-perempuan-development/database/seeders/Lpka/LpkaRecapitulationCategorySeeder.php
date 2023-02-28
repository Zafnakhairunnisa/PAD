<?php

namespace Database\Seeders\Lpka;

use App\Domains\Cluster5\Models\Lpka\LpkaRecapitulationCategory;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class LpkaRecapitulationCategorySeeder extends Seeder
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
        $this->truncate('lpka_recapitulation_categories');

        LpkaRecapitulationCategory::insert([
            ['name' => 'Jumlah Anak Didik Lapas (ANDIKPAS)'],
            ['name' => 'Pendampingan Psikologi Anak Korban'],
            ['name' => 'Advokasi / Bantuan Hukum'],
        ]);

        $this->enableForeignKeys();
    }
}
