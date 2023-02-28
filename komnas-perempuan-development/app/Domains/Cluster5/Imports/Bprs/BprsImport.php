<?php

namespace App\Domains\Cluster5\Imports\Bprs;

use App\Domains\Cluster5\Models\Bprs\Bprs;
use App\Domains\Cluster5\Models\Bprs\BprsRecapitulation;
use App\Domains\Cluster5\Models\Bprs\BprsRecapitulationCategory;
use App\Models\Location;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class BprsImport implements ToCollection, WithStartRow, WithChunkReading, WithValidation, WithBatchInserts
{
    use Importable;

    public function collection(Collection $rows)
    {
        $data = [];
        foreach ($rows as $row) {
            $data[] = [
                'alamat' => $row[0],
                'daftar_sop' => $row[1],
                'sarana_prasarana' => $row[2]
            ];
        }
        Bprs::insert($data);
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
            '2' => 'required|string',
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
            '2' => 'Sarana Prasarana',
        ];
    }

    public function startRow(): int
    {
        return 2;
    }
}
