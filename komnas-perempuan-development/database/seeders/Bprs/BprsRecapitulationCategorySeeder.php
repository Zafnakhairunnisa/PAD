<?php

namespace Database\Seeders\Bprs;

use App\Domains\Cluster5\Models\Bprs\BprsRecapitulationCategory;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class BprsRecapitulationCategorySeeder extends Seeder
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
        $this->truncate('bprs_recapitulation_categories');

        BprsRecapitulationCategory::insert([
            ['name' => 'Pendampingan Anak Berhadapan dengan Hukum'],
            ['name' => 'Pendampingan Psikologi Anak Korban'],
            ['name' => 'Rehabilitasi Anak Korban Baik Hukum, Medis maupun Sosial'],
            ['name' => 'Advokasi / Bantuan Hukum'],
            ['name' => 'Anak Binaan'],
        ]);

        $this->enableForeignKeys();
    }
}
