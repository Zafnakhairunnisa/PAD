<?php

namespace Database\Seeders\AnakKorbanTerorisme;

use App\Domains\Cluster5\Models\AnakKorbanTerorisme\AnakKorbanTerorismeRecapitulationCategory;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class AnakKorbanTerorismeRecapitulationCategorySeeder extends Seeder
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
        $this->truncate('anak_korban_terorisme_recapitulation_categories');

        AnakKorbanTerorismeRecapitulationCategory::insert([
            ['name' => 'Anak Keluarga Napiter'],
            ['name' => 'Anak Keluarga Eks Napiter'],
            ['name' => 'Anak Keluarga Eks Napiter & Napiter'],
        ]);

        $this->enableForeignKeys();
    }
}
