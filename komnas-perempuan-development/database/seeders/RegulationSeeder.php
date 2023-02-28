<?php

namespace Database\Seeders;

use App\Domains\Institutional\Models\Regulation;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class RegulationSeeder extends Seeder
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
        $this->truncate('regulations');

        Regulation::factory()->count(20)->create();
    }
}
