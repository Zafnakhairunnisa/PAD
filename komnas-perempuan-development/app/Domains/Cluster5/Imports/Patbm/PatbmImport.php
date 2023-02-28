<?php

namespace App\Domains\Cluster5\Imports\Patbm;

use App\Domains\Cluster5\Models\Patbm\Patbm;
use App\Models\Location;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class PatbmImport implements ToCollection, WithStartRow, WithChunkReading, WithValidation, WithBatchInserts
{
    use Importable;

    public function collection(Collection $rows)
    {
        $data = [];
        foreach ($rows as $row) {
            $data[] = [
                'nama' => $row[0],
                'tahun' => $row[1],
                'alamat' => $row[2],
                'kelurahan' => $row[3],
                'kapanewon' => $row[4],
                'kabupaten' => $row[5],
                'medsos' => $row[6],
                'ketua' => $row[7],
                'no_telp' => $row[8],
                'fasilitas' => $row[9],
                'kegiatan' => $row[10],
                'prestasi' => $row[11],
            ];
        }
        Patbm::insert($data);
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
            '1' => 'required|integer',
            '2' => 'required|string',
            '3' => 'required|string',
            '4' => 'required|string',
            '5' => 'required|string',
            '6' => 'required|string',
            '7' => 'required|string',
            '8' => 'required|integer',
            '9' => 'required|string',
            '10' => 'required|string',
            '11' => 'required|string',
        ];
    }

    /**
     * @return array
     */
    public function customValidationAttributes()
    {
        return [
            '0' => 'Nama PATBM',
            '1' => 'Tahun Pembentukan',
            '2' => 'Alamat  / Dusun',
            '3' => 'Kelurahan / Kalurahan',
            '4' => 'Kapanewon / Kemantren',
            '5' => 'Kabupaten / Kota',
            '6' => 'Medsos',
            '7' => 'Ketua',
            '8' => 'No Telepon',
            '9' => 'Fasilitas',
            '10' => 'Kegiatan',
            '11' => 'Prestasi',
        ];
    }

    public function startRow(): int
    {
        return 2;
    }
}
