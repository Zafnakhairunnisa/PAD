<?php

namespace Database\Seeders\KekerasanTerhadapAnak;

use App\Domains\Cluster5\Models\KekerasanTerhadapAnak\KekerasanTerhadapAnakRecapitulationCategory;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class KekerasanTerhadapAnakRecapitulationCategorySeeder extends Seeder
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
        $this->truncate('kekerasan_terhadap_anak_recapitulation_categories');

        KekerasanTerhadapAnakRecapitulationCategory::insert([
            ['name' => 'Jumlah Anak'],
            ['name' => 'Jumlah Korban Kekerasan'],
            ['name' => 'Persentase Korban Kekerasan'],
            ['name' => 'Jumlah Korban Kekerasan Seksual'],
            ['name' => 'Jumlah Korban Kekerasan Psikis'],
            ['name' => 'Jumlah Korban Kekerasan Fisik'],
        ]);

        $this->enableForeignKeys();
    }
}
