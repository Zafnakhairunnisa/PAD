<?php

namespace Database\Seeders;

use App\Models\Location;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
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
        $this->truncate('locations');

        Location::insert([
            ['name' => config('constants.location')[0]],
            ['name' => config('constants.location')[1]],
            ['name' => config('constants.location')[2]],
            ['name' => config('constants.location')[3]],
            ['name' => config('constants.location')[4]],
            ['name' => config('constants.location')[5]],
        ]);

        $this->enableForeignKeys();
    }
}
