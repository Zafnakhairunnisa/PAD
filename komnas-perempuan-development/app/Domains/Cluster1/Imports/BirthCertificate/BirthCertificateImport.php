<?php

namespace App\Domains\Cluster1\Imports\BirthCertificate;

use App\Domains\Cluster1\Models\BirthCertificate;
use App\Models\Location;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class BirthCertificateImport implements ToCollection, WithStartRow, WithChunkReading, WithValidation, WithBatchInserts
{
    use Importable;

    public function collection(Collection $rows)
    {
        $data = [];
        foreach ($rows as $row) {
            $data[] = [
                'nama' => $row[0],
                'location_id' => Location::whereName(strtolower($row[1]))->firstOrFail('id'),
                'kalurahan' =>$row[2],
                'kapanewon' => $row[3],
                'kabupaten' => $row[4],
                'alamat' => $row[5],
                'media_sosial' => $row[6],
                'nomor_telepon' => $row[7],
                'nama_pimpinan' => $row[8],
                'kegiatan' => $row[9],
            ];
        }
        BirthCertificate::insert($data);
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
            '0' => 'required',
            '1' => 'required|exists:locations,name',
            '2' => 'required',
            '3' => 'required',
            '4' => 'required',
            '5' => 'required',
            '6' => 'required',
            '7' => 'required',
            '8' => 'required',
            '9' => 'required',
        ];
    }

    /**
     * @return array
     */
    public function customValidationAttributes()
    {
        return [
            '0' => 'Nama organisasi',
            '8' => 'Nama pimpinan',
            '9' => 'Kegiatan',
        ];
    }

    public function startRow(): int
    {
        return 2;
    }
}
