<?php

namespace Database\Seeders\Education;

use App\Domains\Cluster4\Models\Education\EducationRecapitulationCategory;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class EducationRecapitulationCategorySeeder extends Seeder
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
        $this->truncate('education_recapitulation_categories');

        EducationRecapitulationCategory::insert([
            ['name' => 'Rata Rata Lama Sekolah (RLS)'],
            ['name' => 'Angka Putus Sekolah (APS)'],
        ]);

        $this->enableForeignKeys();
    }
}
