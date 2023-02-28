<?php

namespace App\Domains\Institutional\Imports\Kelurahan;

use App\Domains\Institutional\Models\Kelurahan\Kelurahan;
use App\Domains\Institutional\Models\Kelurahan\KelurahanRecapitulation;
use App\Domains\Institutional\Models\Kelurahan\KelurahanRecapitulationCategory;
use App\Models\Location;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class KelurahanImport implements ToCollection, WithStartRow, WithChunkReading, WithValidation, WithBatchInserts
{
    use Importable;

    public function collection(Collection $rows)
    {
        $data = [];
        foreach ($rows as $row) {
            $data[] = [
                'kalurahan_kelurahan' => $row[0],
                'kapanewon' => $row[1],
                'kabupaten' => $row[2],
                'tahun' => $row[3],
                'ketua_gugus' => $row[4],
                'no_gugus' => $row[5],
                'profil_anak' => $row[6],
                'forum_anak' => $row[7],
                'ruang_bermain' => $row[8],
                'pusat_informasi' => $row[9],
                'pusat_kreatifitas' => $row[10],
                'satgas_ppa' => $row[11],
                'patbm' => $row[12],
                'pikr' => $row[13],
                'kawasan_tanpa_rokok' => $row[14]
            ];
        }

        Kelurahan::insert($data);
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
            '4' => 'required|string',
            '5' => 'required|string',
            '6' => 'required|string',
            '7' => 'required|string',
            '8' => 'required|string',
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
            '0' => 'Kalurahan / Kelurahan',
            '1' => 'Kapanewon / Kemantren',
            '2' => 'Kabupaten / Kota',
            '3' => 'Tahun Pembentukan',
            '4' => 'Ketua Gugus Tugas',
            '5' => 'Nomer Hape Gugus Tugas',
            '6' => 'Profil Anak',
            '7' => 'Forum Anak',
            '8' => 'Ruang Bermain Ramah Anak',
            '9' => 'Pusat Informasi Sahabat Anak',
            '10' => 'Pusat Kreatifitas Anak',
            '11' => 'Satgas PPA',
            '12' => 'PATBM',
            '13' => 'PIKR',
            '14' => 'Kawasan Tanpa Rokok',
        ];
    }

    public function startRow(): int
    {
        return 2;
    }
}
