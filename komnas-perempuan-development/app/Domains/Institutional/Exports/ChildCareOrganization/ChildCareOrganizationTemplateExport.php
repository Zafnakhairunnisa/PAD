<?php

namespace App\Domains\Institutional\Exports\ChildCareOrganization;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ChildCareOrganizationTemplateExport implements FromCollection, WithHeadings
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
            'Wilayah Kerja',
            'Alamat',
            'Kelurahan / Kelurahan',
            'Kapanewon / Kemantren',
            'Kabupaten / Kota',
            'Media Sosial',
            'Nomor Telepon',
            'Nama Pimpinan',
            'Kegiatan',
        ];
    }
}
