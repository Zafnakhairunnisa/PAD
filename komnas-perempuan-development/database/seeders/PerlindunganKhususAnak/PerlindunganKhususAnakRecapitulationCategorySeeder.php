<?php

namespace Database\Seeders\PerlindunganKhususAnak;

use App\Domains\Cluster5\Models\PerlindunganKhususAnak\PerlindunganKhususAnakRecapitulationCategory;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class PerlindunganKhususAnakRecapitulationCategorySeeder extends Seeder
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
        $this->truncate('perlindungan_khusus_anak_recapitulation_categories');

        PerlindunganKhususAnakRecapitulationCategory::insert([
            ['name' => 'Anak Penyandang Disabilitas'],
            ['name' => 'Anak Korban Traficcking'],
            ['name' => 'Anak Terlantar dan Perlakuan Salah'],
            ['name' => 'Anak Korban Konflik Perceraian '],
            ['name' => 'Anak Jalanan'],
            ['name' => 'Jumlah Anak Umur 0-19 tahun Korban Napza'],
            ['name' => 'Anak Korban Bencana'],
            ['name' => 'Pekerja Anak'],
        ]);

        $this->enableForeignKeys();
    }
}
