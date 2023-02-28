<?php

namespace App\Domains\Cluster2\Exports\ChildWelfareInstitution;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ChildWelfareInstitutionTemplateExport implements FromCollection, WithHeadings
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
            'Nama Lembaga',
            'Jenis Lembaga',
            'Tahun Berdiri',
            'Legalitas',
            'Akreditasi',
            'Dusun / Jalan',
            'Kelurahan / Kelurahan',
            'Kapanewon / Kemantren',
            'Kabupaten / Kota',
            'Media Sosial',
            'Nama Pimpinan',
            'No Telepon',
            'Jumlah Anak Asuh',
            'Fasilitas',
            'Kegiatan',
        ];
    }
}
