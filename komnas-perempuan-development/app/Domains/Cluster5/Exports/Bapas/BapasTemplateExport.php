<?php

namespace App\Domains\Cluster5\Exports\Bapas;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BapasTemplateExport implements FromCollection, WithHeadings
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
            'Alamat',
            'Daftar SOP',
            'Fasilitas',
        ];
    }
}
