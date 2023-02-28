<?php

namespace App\Domains\Cluster2\Imports\ChildFriendlyPlayroom;

use App\Domains\Cluster2\Models\ChildFriendlyPlayroom\ChildFriendlyPlayroom;
use App\Domains\Cluster2\Models\ChildFriendlyPlayroom\ChildFriendlyPlayroomCategory;
use App\Models\Location;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ChildFriendlyPlayroomImport implements ToCollection, WithStartRow, WithChunkReading, WithValidation, WithBatchInserts
{
    use Importable;

    public function collection(Collection $rows)
    {
        $data = [];
        foreach ($rows as $row) {
            $data[] = [
                'nama' => $row[0],
                'alamat' => $row[1],
                'kalurahan' => $row[2],
                'kapanewon' => $row[3],
                'location_id' => Location::whereName(strtolower($row[4]))->firstOrFail('id'),
                'sertifikasi' => $row[5],
                'jenis' => $row[6],
                'fasilitas' => $row[7],
            ];
        }
        ChildFriendlyPlayroom::insert($data);
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
            '3' => 'required|string',
            '4' => 'required|exists:locations,name',
            '5' => 'nullable|string|in:yes,no',
            '6' => 'nullable|string|in:dalam_ruang,luar_ruang',
            '7' => 'nullable|string',
        ];
    }

    /**
     * @return array
     */
    public function customValidationAttributes()
    {
        return [
            '0' => 'Nama RBRA',
            '1' => 'Alamat / Dusun',
            '2' => 'Kelurahan / Kelurahan',
            '3' => 'Kapanewon / Kemantren',
            '4' => 'Kabupaten / Kota',
            '5' => 'Sertifikasi',
            '6' => 'Jenis',
            '7' => 'Fasilitas',
        ];
    }

    public function startRow(): int
    {
        return 2;
    }
}
