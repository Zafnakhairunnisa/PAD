<?php

namespace App\Domains\Institutional\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RegulationTemplateExport implements FromCollection, WithHeadings
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
            'Nama Peraturan',
            'Tahun',
            'Jenis Peraturan/Kebijakan',
            'Macam Peraturan/Kebijakan',
            'Wilayah',
        ];
    }
}
