<?php

namespace Database\Seeders\ChildNutrition;

use App\Domains\Cluster3\Models\ChildNutrition\ChildNutritionRecapitulationCategory;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class ChildNutritionRecapitulationCategorySeeder extends Seeder
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
        $this->truncate('child_nutrition_recapitulation_categories');

        ChildNutritionRecapitulationCategory::insert([
            ['name' => 'Prevalensi Gizi Lebih'],
            ['name' => 'Prevalensi Gizi Buruk'],
            ['name' => 'Prevalensi Gizi Kurang'],
            ['name' => 'Prevalensi Balita Kurang Energi Protein (KEP) (Gizi Buruk dan Gizi Kurang)'],
            ['name' => 'Prevalensi Balita Stunting'],
            ['name' => 'Prevalensi Balita Wasting'],
        ]);

        $this->enableForeignKeys();
    }
}
