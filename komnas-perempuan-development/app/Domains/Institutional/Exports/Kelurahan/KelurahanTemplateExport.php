<?php

namespace App\Domains\Institutional\Exports\Kelurahan;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KelurahanTemplateExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return collect();
    }

    public function headings(): array
    {
        return [
            'Kalurahan / Kelurahan',
            'Kapanewon / Kemantren',
            'Kabupaten / Kota',
            'Tahun Pembentukan',
            'Ketua Gugus Tugas',
            'Nomer Hape Gugus Tugas',
            'Profil Anak',
            'Forum Anak',
            'Ruang Bermain Ramah Anak',
            'Pusat Informasi Sahabat Anak',
            'Pusat Kreatifitas Anak',
            'Satgas PPA',
            'PATBM',
            'PIKR',
            'Kawasan Tanpa Rokok',
        ];
    }
}
