<?php

namespace App\Domains\Institutional\Exports\SatgasPPA;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SatgasPPATemplateExport implements FromCollection, WithHeadings
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
            'Nama Satgas',
            'Nomor Telepon',
            'Tingkatan Satgas PPA',
            'Kalurahan/Kelurahan',
            'Kapanewon/Kemantren',
            'Kabupaten/Kota',
            'SK satgas',
        ];
    }
}
