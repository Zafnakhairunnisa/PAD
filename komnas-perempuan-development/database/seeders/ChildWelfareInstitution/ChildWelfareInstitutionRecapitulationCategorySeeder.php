<?php

namespace Database\Seeders\ChildWelfareInstitution;

use App\Domains\Cluster2\Models\ChildWelfareInstitution\ChildWelfareInstitutionRecapitulationCategory;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class ChildWelfareInstitutionRecapitulationCategorySeeder extends Seeder
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
        $this->truncate('child_welfare_institution_recapitulation_categories');

        ChildWelfareInstitutionRecapitulationCategory::insert([
            ['name' => 'LKSA'],
            ['name' => 'LKSA Terstandarisasi'],
            ['name' => 'Persentase LKSA Terstandarisasi'],
            ['name' => 'Jumlah Anak Asuh di LKSA'],
            ['name' => 'Jumlah Anak Adopsi di LKSA'],
        ]);

        $this->enableForeignKeys();
    }
}
