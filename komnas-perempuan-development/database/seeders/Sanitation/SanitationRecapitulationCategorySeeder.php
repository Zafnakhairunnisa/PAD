<?php

namespace Database\Seeders\Sanitation;

use App\Domains\Cluster3\Models\Sanitation\SanitationRecapitulationCategory;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class SanitationRecapitulationCategorySeeder extends Seeder
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
        $this->truncate('sanitation_recapitulation_categories');

        SanitationRecapitulationCategory::insert([
            ['name' => 'Cakupan Air Bersih'],
            ['name' => 'Cakupan PDAM'],
            ['name' => 'Kepala Keluarga'],
            ['name' => 'Kepala Keluarga Dengan Jamban Sehat'],
            ['name' => 'Presentase Kepala Keluarga Dengan Jamban Sehat'],
        ]);

        $this->enableForeignKeys();
    }
}
