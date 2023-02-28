<?php

namespace App\Domains\Institutional\Imports;

use App\Domains\Institutional\Models\Regulation;
use App\Models\Location;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class RegulationImport implements ToCollection, WithStartRow, WithChunkReading, WithValidation, WithBatchInserts
{
    use Importable;

    public function collection(Collection $rows)
    {
        $data = [];
        foreach ($rows as $row) {
            $data[] = [
                'name' => $row[0],
                'year' => $row[1],
                'rule_type' => $row[2],
                'type' => $row[3],
                'location_id' => Location::whereName($row[4])->firstOrFail(['id'])->id,
                'slug' => \Str::slug($row[0]),
            ];
        }
        Regulation::insert($data);
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
            '1' => 'required|max:4',
            '2' => ['required', Rule::in(config('constants.rule_type'))],
            '3' => 'required|string',
            '4' => 'required|string|exists:locations,name',
        ];
    }

    /**
     * @return array
     */
    public function customValidationMessages()
    {
        return [
            '0.required' => 'Nama Peraturan harus diisi',
            '1.required' => 'Tahun terbit harus diisi',
            '1.max' => 'Tahun terbit tidak lebih dari 4 karakter',
            '2.rule_type' => 'Jenis peraturan/kebijakan harus merupakan salah satu dari ',
            '3.type' => 'Macam peraturan/kebijakan harus diisi',
            '4.required' => 'Wilayah harus diisi',
            '4.exists' => 'Nama Wilayah harus sesuai dengan pilihan yang ada',
        ];
    }

    public function startRow(): int
    {
        return 2;
    }
}
