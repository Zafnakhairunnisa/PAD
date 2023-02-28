<?php

namespace App\Domains\Institutional\Imports\ChildProtectionActivity;

use App\Domains\Institutional\Models\ChildProtectionActivity;
use App\Domains\Institutional\Models\ChildProtectionActivitySourceOfFunds;
use App\Domains\Institutional\Models\ChildProtectionActivityType;
use App\Models\Location;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ChildProtectionActivityImport implements ToCollection, WithStartRow, WithChunkReading, WithValidation, WithBatchInserts
{
    use Importable;

    public function collection(Collection $rows)
    {
        $data = [];
        foreach ($rows as $row) {
            $data[] = [
                'company_name' => $row[0],
                'source_of_fund_id' => ChildProtectionActivitySourceOfFunds::whereName($row[1])->first()->id,
                'activity_name' => $row[2],
                'activity_type_id' => ChildProtectionActivityType::whereName($row[3])->first()->id,
                'target' => $row[4],
                'budget' => $row[5],
                'year' => $row[6],
                'location_id' => Location::whereName($row[7])->first()->id,
                'slug' => \Str::slug($row[2]),
            ];
        }
        ChildProtectionActivity::insert($data);
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
            '0' => 'required|string', // nama
            '1' => 'required|exists:child_protection_activity_source_of_funds,name', // sumber dana
            '2' => 'required', // nama kegiatan
            '3' => 'required|exists:child_protection_activity_types,name', // jenis kegiatan
            '4' => 'required', // sasaran
            '5' => 'required', // anggaran
            '6' => 'required', // tahun
            '7' => 'required|exists:locations,name', // wilayah
        ];
    }

    /**
     * @return array
     */
    public function customValidationAttributes()
    {
        return [
            '0' => 'Nama lembaga/opd/lsm/perusahaan',
            '1' => 'Sumber dana',
            '2' => 'Nama kegiatan',
            '3' => 'Jenis kegiatan',
            '4' => 'Sasaran',
            '5' => 'Anggaran',
            '6' => 'Tahun',
            '7' => 'Wilayah',
        ];
    }

    public function startRow(): int
    {
        return 2;
    }
}
