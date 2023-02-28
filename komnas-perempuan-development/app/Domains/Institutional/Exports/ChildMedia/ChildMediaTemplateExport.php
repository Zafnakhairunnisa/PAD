<?php

namespace App\Domains\Institutional\Exports\ChildMedia;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ChildMediaTemplateExport implements FromCollection, WithHeadings
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
            'Nama Organisasi',
            'Jenis Media',
            'Alamat',
            'Kelurahan / Kelurahan',
            'Kapanewon / Kemantren',
            'Kabupaten / Kota',
            'Media Sosial',
            'Nomor Telepon',
            'Nama Pimpinan',
            'Nama Rubrik / Acara',
        ];
    }
}
