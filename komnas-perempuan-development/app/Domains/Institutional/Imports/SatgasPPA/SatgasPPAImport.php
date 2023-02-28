<?php

namespace App\Domains\Institutional\Imports\SatgasPPA;

use App\Domains\Institutional\Models\SatgasPPA;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class SatgasPPAImport implements ToCollection, WithStartRow, WithChunkReading, WithValidation, WithBatchInserts
{
    use Importable;

    public function collection(Collection $rows)
    {
        $data = [];
        foreach ($rows as $row) {
            $data[] = [
                'name' => $row[0],
                'phone' => $row[1],
                'level' => $row[2],
                'kelurahan' => $row[3],
                'kemantren' => $row[4],
                'kabupaten' => $row[5],
                'nomor' => $row[6],
                'slug' => \Str::slug($row[0]),
            ];
        }
        SatgasPPA::insert($data);
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
            '1' => 'required',
            '2' => 'required',
            '3' => 'required',
            '4' => 'required',
            '5' => 'required',
            '6' => 'required',
        ];
    }

    /**
     * @return array
     */
    public function customValidationAttributes()
    {
        return [
            '0' => 'Nama satgas',
            '1' => 'Nomor telepon',
            '2' => 'Tingkatan satgas ppa',
            '3' => 'Kalurahan/Kelurahan',
            '4' => 'Kapanewon/Kemantren',
            '5' => 'Kabupaten/Kota',
            '6' => 'SK satgas',
        ];
    }

    public function startRow(): int
    {
        return 2;
    }
}
