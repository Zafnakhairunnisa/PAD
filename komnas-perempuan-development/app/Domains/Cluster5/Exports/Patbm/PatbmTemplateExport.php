<?php

namespace App\Domains\Cluster5\Exports\Patbm;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PatbmTemplateExport implements FromCollection, WithHeadings
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
            'Nama PATBM',
            'Tahun Pembentukan',
            'Alamat  / Dusun',
            'Kelurahan / Kalurahan',
            'Kapanewon / Kemantren',
            'Kabupaten / Kota',
            'Medsos',
            'Ketua',
            'No Telepon',
            'Fasilitas',
            'Kegiatan',
            'Prestasi',
        ];
    }
}
