<?php

namespace App\Domains\Cluster2\Exports\FamilyConsultancy;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FamilyConsultancyTemplateExport implements FromCollection, WithHeadings
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
            'Jenis',
            'Alamat',
            'Kelurahan / Kelurahan',
            'Kapanewon / Kemantren',
            'Kabupaten / Kota',
            'Media Sosial',
            'Nama Pimpinan',
            'Nomor Telepon',
            'Nomor Sertifikasi',
            'Kegiatan',
            'Jumlah Klien per Tahun',
            'Fasilitas',
            'Kegiatan',
        ];
    }
}
