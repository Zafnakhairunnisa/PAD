<?php

namespace Database\Seeders\ChildProtectionActivity;

use App\Domains\Institutional\Models\ChildProtectionActivityRecapitulations;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class ChildProtectionActivityRecapitulationSeeder extends Seeder
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
        $this->truncate('child_protection_activity_recapitulations');

        ChildProtectionActivityRecapitulations::factory()->count(10)->create();
    }
}
