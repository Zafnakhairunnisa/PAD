<?php

namespace App\Domains\Cluster2\Imports\FamilyConsultancy;

use App\Domains\Cluster2\Models\FamilyConsultancy\FamilyConsultancy;
use App\Domains\Cluster2\Models\FamilyConsultancy\FamilyConsultancyCategory;
use App\Models\Location;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class FamilyConsultancyImport implements ToCollection, WithStartRow, WithChunkReading, WithValidation, WithBatchInserts
{
    use Importable;

    public function collection(Collection $rows)
    {
        $data = [];
        foreach ($rows as $row) {
            $data[] = [
                'nama' => $row[0],
                'kategori_id' => FamilyConsultancyCategory::whereName(strtolower($row[1]))->firstOrFail('id'),
                'alamat' => $row[2],
                'kapanewon' => $row[3],
                'location_id' => Location::whereName(strtolower($row[4]))->firstOrFail('id'),
                'media_sosial' => $row[5],
                'no_telepon' => $row[6],
                'no_sertifikasi' => $row[6],
                'kegiatan' => $row[7],
                'klien' => $row[8],
                'fasilitas' => $row[9],
            ];
        }
        FamilyConsultancy::insert($data);
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
            '1' => 'required|exists:family_consultancy_categories,name',
            '2' => 'required|string',
            '3' => 'required|string',
            '4' => 'required|string',
            '5' => 'required|exists:locations,name',
            '6' => 'required|string',
            '7' => 'required|string',
            '8' => 'required|string',
            '9' => 'required|string',
            '10' => 'required|string',
            '11' => 'required|string',
            '12' => 'required|string',
        ];
    }

    /**
     * @return array
     */
    public function customValidationAttributes()
    {
        return [
            '0' => 'Nama lembaga',
            '7' => 'Nama pimpinan',
            '8' => 'Nomor telepon',
            '9' => 'Nomor sertifikasi',
            '10' => 'Kegiatan',
            '11' => 'Klien',
            '12' => 'Fasilitas',
        ];
    }

    public function startRow(): int
    {
        return 2;
    }
}
