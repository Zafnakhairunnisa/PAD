<?php

namespace Database\Seeders\MedicalFacility;

use App\Domains\Cluster3\Models\MedicalFacility\MedicalFacilityCategory;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class MedicalFacilityCategorySeeder extends Seeder
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
        $this->truncate('medical_facility_categories');

        MedicalFacilityCategory::insert([
            ['name' => 'Puskesmas'],
            ['name' => 'Rumah Sakit'],
        ]);

        $this->enableForeignKeys();
    }
}
