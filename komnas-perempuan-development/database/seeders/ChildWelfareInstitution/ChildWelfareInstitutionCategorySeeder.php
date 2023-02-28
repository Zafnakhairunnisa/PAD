<?php

namespace Database\Seeders\ChildWelfareInstitution;

use App\Domains\Cluster2\Models\ChildWelfareInstitution\ChildWelfareInstitutionCategory;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class ChildWelfareInstitutionCategorySeeder extends Seeder
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
        $this->truncate('child_welfare_institution_categories');

        ChildWelfareInstitutionCategory::insert([
            ['name' => 'LKS Anak Terlantar'],
            ['name' => 'LKS Anak Balita Terlantar'],
            ['name' => 'LKS Anak dengan Disabilitas'],
        ]);

        $this->enableForeignKeys();
    }
}
