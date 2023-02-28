<?php

namespace Database\Seeders\BreastFeeding;

use App\Domains\Cluster3\Models\BreastFeeding\BreastFeedingRecapitulationCategory;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class BreastFeedingRecapitulationCategorySeeder extends Seeder
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
        $this->truncate('breast_feeding_recapitulation_categories');

        BreastFeedingRecapitulationCategory::insert([
            ['name' => 'Pemberian ASI Eksklusif'],
            ['name' => 'Pemberian Makanan Pendamping ASI (MP ASI)'],
            ['name' => 'Inisiasi Menyusu Dini (IMD)'],
            ['name' => 'Konselor ASI'],
            ['name' => 'Kader Pemberian Makanan Bagi Bayi dan Anak (PMBA)'],
        ]);

        $this->enableForeignKeys();
    }
}
