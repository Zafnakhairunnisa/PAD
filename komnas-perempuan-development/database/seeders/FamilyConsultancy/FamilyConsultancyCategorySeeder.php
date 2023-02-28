<?php

namespace Database\Seeders\FamilyConsultancy;

use App\Domains\Cluster2\Models\FamilyConsultancy\FamilyConsultancyCategory;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class FamilyConsultancyCategorySeeder extends Seeder
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
        $this->truncate('family_consultancy_categories');

        FamilyConsultancyCategory::insert([
            ['name' => config('constants.family_consultancy.category')[0]],
            ['name' => config('constants.family_consultancy.category')[1]],
            ['name' => config('constants.family_consultancy.category')[2]],
            ['name' => config('constants.family_consultancy.category')[3]],
            ['name' => config('constants.family_consultancy.category')[4]],
            ['name' => config('constants.family_consultancy.category')[5]],
            ['name' => config('constants.family_consultancy.category')[6]],
        ]);

        $this->enableForeignKeys();
    }
}
