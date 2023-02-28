<?php

namespace Database\Seeders\PaudHi;

use App\Domains\Cluster2\Models\PaudHi\PaudHiCategory;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class PaudHiCategorySeeder extends Seeder
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
        $this->truncate('paud_hi_categories');

        PaudHiCategory::insert([
            ['name' => 'PAUD'],
            ['name' => 'PAUD HI'],
            ['name' => 'Persentase PAUD HI'],
        ]);

        $this->enableForeignKeys();
    }
}
