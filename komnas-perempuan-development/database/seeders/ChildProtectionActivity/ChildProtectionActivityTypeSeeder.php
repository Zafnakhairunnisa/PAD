<?php

namespace Database\Seeders\ChildProtectionActivity;

use App\Domains\Institutional\Models\ChildProtectionActivityType;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Seeder;

class ChildProtectionActivityTypeSeeder extends Seeder
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
        $this->truncate('child_protection_activity_types');

        $activityTypes = [
            [
                'name' => 'Kelembagaan',
            ],
            [
                'name' => 'Hak Sipil Kebebasan',
            ],
            [
                'name' => 'Lingkungan Keluarga dan Pengasuhan Alternatif ',
            ],
            [
                'name' => 'Kesehatan Dasar dan Kesejahteraan',
            ],
            [
                'name' => 'Pendidikan, Pemanfaatan Waktu Luang, dan Kegiatan Budaya',
            ],
            [
                'name' => 'Perlindungan Khusus Anak',
            ],
        ];

        ChildProtectionActivityType::insert($activityTypes);
    }
}
