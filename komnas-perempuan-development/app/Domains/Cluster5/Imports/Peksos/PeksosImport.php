<?php

namespace App\Domains\Cluster5\Imports\Peksos;

use App\Domains\Cluster5\Models\Peksos\Peksos;
use App\Models\Location;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class PeksosImport implements ToCollection, WithStartRow, WithChunkReading, WithValidation, WithBatchInserts
{
    use Importable;

    public function collection(Collection $rows)
    {
        $data = [];
        foreach ($rows as $row) {
            $data[] = [
                'alamat' => $row[0],
                'daftar_sop' => $row[1],
                'fasilitas' => $row[2],
            ];
        }
        Peksos::insert($data);
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
            '1' => 'required|string',
            '1' => 'required|string',
        ];
    }

    /**
     * @return array
     */
    public function customValidationAttributes()
    {
        return [
            '0' => 'Alamat',
            '1' => 'Daftar SOP',
            '2' => 'Fasilitas',
        ];
    }

    public function startRow(): int
    {
        return 2;
    }
}
