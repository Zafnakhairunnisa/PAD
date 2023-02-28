<?php

namespace App\Domains\Institutional\Exports\ChildForum;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ChildForumTemplateExport implements FromCollection, WithHeadings
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
            'Nama Forum Anak',
            'Tingkat Forum Anak',
            'Surat Keputusan',
            'Waktu Pembentukan',
            'Nama Ketua',
            'Nomor Telepon',
            'Alamat',
            'Kelurahan / Kelurahan',
            'Kapanewon / Kemantren',
            'Kabupaten / Kota',
            'Media Sosial',
            'Pelatihan KHA',
            'Partisipasi Musrenbang',
            'Kegiatan',
            'Prestasi',
        ];
    }
}
