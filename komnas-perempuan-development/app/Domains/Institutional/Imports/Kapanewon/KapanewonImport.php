<?php

namespace App\Domains\Institutional\Imports\Kapanewon;

use App\Domains\Institutional\Models\Kapanewon\Kapanewon;
use App\Domains\Institutional\Models\Kapanewon\KapanewonRecapitulation;
use App\Domains\Institutional\Models\Kapanewon\KapanewonRecapitulationCategory;
use App\Models\Location;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class KapanewonImport implements ToCollection, WithStartRow, WithChunkReading, WithValidation, WithBatchInserts
{
    use Importable;

    public function collection(Collection $rows)
    {
        $data = [];
        foreach ($rows as $row) {
            $data[] = [
                'kapanewon_kemantren' => $row[0],
                'kabupaten' => $row[1],
                'tahun' => $row[2],
                'ketua_gugus' => $row[3],
                'no_gugus' => $row[4],
                'profil_anak' => $row[5],
                'forum_anak' => $row[6],
                'ruang_bermain' => $row[7],
                'pusat_informasi' => $row[8],
                'pusat_kreatifitas' => $row[9],
                'satgas_ppa' => $row[10],
                'patbm' => $row[11],
                'pikr' => $row[12],
                'kawasan_tanpa_rokok' => $row[13]
            ];
        }

        Kapanewon::insert($data);
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
            '2' => 'required|integer',
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
        ];
    }

    /**
     * @return array
     */
    public function customValidationAttributes()
    {
        return [
            '0' => 'Kapanewon / Kemantren',
            '1' => 'Kabupaten / Kota',
            '2' => 'Tahun Pembentukan',
            '3' => 'Ketua Gugus Tugas',
            '4' => 'Nomer Hape Gugus Tugas',
            '5' => 'Profil Anak',
            '6' => 'Forum Anak',
            '7' => 'Ruang Bermain Ramah Anak',
            '8' => 'Pusat Informasi Sahabat Anak',
            '9' => 'Pusat Kreatifitas Anak',
            '10' => 'Satgas PPA',
            '11' => 'PATBM',
            '12' => 'PIKR',
            '13' => 'Kawasan Tanpa Rokok',
        ];
    }

    public function startRow(): int
    {
        return 2;
    }
}
