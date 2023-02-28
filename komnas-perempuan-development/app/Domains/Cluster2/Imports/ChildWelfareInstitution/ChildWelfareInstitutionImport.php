<?php

namespace App\Domains\Cluster2\Imports\ChildWelfareInstitution;

use App\Domains\Cluster2\Models\ChildWelfareInstitution\ChildWelfareInstitution;
use App\Domains\Cluster2\Models\ChildWelfareInstitution\ChildWelfareInstitutionCategory;
use App\Models\Location;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ChildWelfareInstitutionImport implements ToCollection, WithStartRow, WithChunkReading, WithValidation, WithBatchInserts
{
    use Importable;

    public function collection(Collection $rows)
    {
        $data = [];
        foreach ($rows as $row) {
            $data[] = [
                'nama' => $row[0],
                'jenis_id' => ChildWelfareInstitutionCategory::whereName(strtolower($row[1]))->firstOrFail('id'),
                'tahun_berdiri' => $row[2],
                'legalitas' => $row[3],
                'akreditasi' => $row[4],
                'dusun' => $row[5],
                'kalurahan' => $row[6],
                'kapanewon' => $row[7],
                'location_id' => Location::whereName(strtolower($row[8]))->firstOrFail('id'),
                'media_sosial' => $row[9],
                'nama_pimpinan' => $row[10],
                'no_telepon' => $row[11],
                'jumlah_anak_asuh' => $row[12],
                'fasilitas' => $row[13],
                'kegiatan' => $row[14],
            ];
        }
        ChildWelfareInstitution::insert($data);
    }

    public function chunkSize(): int
    {
        return 500;
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function rules(): array
    {
        return [
            '0' => 'required|string',
            '1' => 'required|exists:child_welfare_institution_categories,name',
            '2' => 'required|string',
            '3' => 'required|string',
            '4' => 'required|string',
            '5' => 'required|string',
            '6' => 'required|string',
            '7' => 'required|string',
            '8' => 'required|exists:locations,name',
            '9' => 'required|string',
            '10' => 'required|string',
            '11' => 'required|string',
            '12' => 'required|string',
            '13' => 'required|string',
            '14' => 'required|string',
        ];
    }

    /**
     * @return array
     */
    public function customValidationAttributes()
    {
        return [
            '0' => 'Nama lembaga',
            '1' => 'Jenis lembaga',
            '2' => 'Tahun berdiri',
            '3' => 'Legalitas',
            '4' => 'Akreditasi',
            '5' => 'Dusun / Jalan',
            '6' => 'Kelurahan / Kelurahan',
            '7' => 'Kapanewon / Kemantren',
            '8' => 'Kabupaten / Kota',
            '9' => 'Media sosial',
            '10' => 'Nama pimpinan',
            '11' => 'No telepon',
            '12' => 'Jumlah anak Asuh',
            '13' => 'Fasilitas',
            '14' => 'Kegiatan',
        ];
    }

    public function startRow(): int
    {
        return 2;
    }
}
