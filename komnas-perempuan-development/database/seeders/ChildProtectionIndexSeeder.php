<?php

namespace Database\Seeders;

use App\Domains\Institutional\Models\ChildProtectionIndex;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class ChildProtectionIndexSeeder extends Seeder
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
        $this->truncate('child_protection_indices');

        ChildProtectionIndex::factory()->count(10)->create();
    }
}
