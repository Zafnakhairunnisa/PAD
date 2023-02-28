<?php

namespace Database\Seeders\ChildFriendlyPlayroom;

use App\Domains\Cluster2\Models\ChildFriendlyPlayroom\ChildFriendlyPlayroomCategory;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class ChildFriendlyPlayroomCategorySeeder extends Seeder
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
        $this->truncate('child_friendly_playroom_categories');

        ChildFriendlyPlayroomCategory::insert([
            ['name' => 'RBRA'],
            ['name' => 'RBRA Terstandarisasi'],
            ['name' => 'Persentase RBRA Terstandarisasi'],
        ]);

        $this->enableForeignKeys();
    }
}
