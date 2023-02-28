<?php

namespace Database\Seeders\Kelembagaan\SatgasPPA;

use App\Domains\Institutional\Models\SatgasPPARecapitulation;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class SatgasPPARecapitulationSeeder extends Seeder
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
        $this->truncate('satgas_p_p_a_recapitulations');

        SatgasPPARecapitulation::factory()->count(10)->create();
    }
}
