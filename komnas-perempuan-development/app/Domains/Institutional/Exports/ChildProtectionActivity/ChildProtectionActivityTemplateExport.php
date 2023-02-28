<?php

namespace App\Domains\Institutional\Exports\ChildProtectionActivity;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ChildProtectionActivityTemplateExport implements FromCollection, WithHeadings
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
            'Nama Lembaga/OPD/LSM/Perusahaan',
            'Sumber Dana',
            'Nama Kegiatan',
            'Jenis Kegiatan',
            'Sasaran',
            'Anggaran',
            'Tahun',
            'Wilayah',
        ];
    }
}
