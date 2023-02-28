<?php

namespace App\Domains\Cluster2\Exports\ChildFriendlyPlayroom;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ChildFriendlyPlayroomTemplateExport implements FromCollection, WithHeadings
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
            'Nama RBRA',
            'Alamat / Dusun',
            'Kelurahan / Kelurahan',
            'Kapanewon / Kemantren',
            'Kabupaten / Kota',
            'Sertifikasi',
            'Jenis',
            'Fasilitas',
        ];
    }
}
