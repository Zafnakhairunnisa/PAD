<?php

namespace App\Domains\Cluster5\Exports\Peksos;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PeksosTemplateExport implements FromCollection, WithHeadings
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
