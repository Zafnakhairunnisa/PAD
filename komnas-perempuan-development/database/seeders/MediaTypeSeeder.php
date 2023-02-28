<?php

namespace Database\Seeders;

use App\Models\MediaType;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class MediaTypeSeeder extends Seeder
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
        $this->truncate('media_types');

        MediaType::create(['name' => 'radio']);
        MediaType::create(['name' => 'televisi']);
        MediaType::create(['name' => 'surat kabar']);
        MediaType::create(['name' => 'majalah']);
    }
}
