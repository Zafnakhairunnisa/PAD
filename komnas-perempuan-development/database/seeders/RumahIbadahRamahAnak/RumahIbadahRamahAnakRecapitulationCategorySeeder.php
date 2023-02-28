<?php

namespace Database\Seeders\RumahIbadahRamahAnak;

use App\Domains\Cluster4\Models\RumahIbadahRamahAnak\RumahIbadahRamahAnakRecapitulationCategory;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class RumahIbadahRamahAnakRecapitulationCategorySeeder extends Seeder
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
        $this->truncate('rumah_ibadah_ramah_anak_recapitulation_categories');

        RumahIbadahRamahAnakRecapitulationCategory::insert([
            ['name' => 'Rumah Ibadah Ramah Anak'],
            ['name' => 'Masjid'],
            ['name' => 'Kelenteng'],
            ['name' => 'Gereja Katolik'],
            ['name' => 'Gereja Kristen'],
            ['name' => 'Pura'],
            ['name' => 'Wihara'],
        ]);

        $this->enableForeignKeys();
    }
}
