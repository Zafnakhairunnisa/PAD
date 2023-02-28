<?php

namespace Database\Seeders\MedicalFacility;

use App\Domains\Cluster3\Models\MedicalFacility\MedicalFacilityRecapitulationCategory;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class MedicalFacilityRecapitulationCategorySeeder extends Seeder
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
        $this->truncate('medical_facility_recapitulation_categories');

        MedicalFacilityRecapitulationCategory::insert([
            ['name' => 'Puskesmas'],
            ['name' => 'Puskesmas Ramah Anak'],
            ['name' => 'Persentase Puskesmas Ramah Anak'],
            ['name' => 'Ruang Bermain di Puskesmas Ramah Anak'],
            ['name' => 'Pusat Informasi Sahabat Anak di Puskesmas Ramah Anak'],
            ['name' => 'Psikolog'],
            ['name' => 'R Laktasi'],
            ['name' => 'Kawasan Tanpa Rokok'],
            ['name' => 'Toilet Ramah Anak'],
            ['name' => 'Layanan Ramah Anak'],
            ['name' => 'Rumah Sakit'],
            ['name' => 'Rumah Sakit Ramah Anak'],
            ['name' => 'Persentase Rumah Sakit Ramah Anak'],
        ]);

        $this->enableForeignKeys();
    }
}
