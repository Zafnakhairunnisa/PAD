<?php

namespace Database\Seeders;

use App\Domains\Institutional\Models\Regulation;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class RegulationRecapitulationSeeder extends Seeder
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
        $this->truncate('regulation_recapitulations');

        Regulation::factory()->count(10)->create();
    }
}
