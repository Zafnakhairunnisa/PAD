<?php

namespace Database\Seeders\ChildProtectionActivity;

use App\Domains\Institutional\Models\ChildProtectionActivitySourceOfFunds;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class ChildProtectionActivitySourceOfFundsSeeder extends Seeder
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
        $this->truncate('child_protection_activity_source_of_funds');

        ChildProtectionActivitySourceOfFunds::create([
            'name' => 'APBD',
        ]);
        ChildProtectionActivitySourceOfFunds::create([
            'name' => 'CSR/ZIS',
        ]);
    }
}
