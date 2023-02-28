<?php

namespace App\Domains\Cluster5\Imports\PerlindunganKhususAnak;

use App\Domains\Cluster5\Models\PerlindunganKhususAnak\PerlindunganKhususAnakRecapitulation;
use App\Models\Location;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use App\Domains\Cluster5\Models\PerlindunganKhususAnak\PerlindunganKhususAnakRecapitulationCategory;

class PerlindunganKhususAnakImport implements ToCollection, WithStartRow, WithChunkReading, WithValidation, WithBatchInserts
{
    use Importable;

    public function collection(Collection $rows)
    {   
        $category = PerlindunganKhususAnakRecapitulationCategory::select('id','name')->get()->toArray();
        $location = Location::select('id','name')->get()->toArray();

        $data = [];
        foreach ($rows as $row) {
            $key_category = array_search($row[0], array_column($category, 'name'));
            $key_location = array_search($row[4], array_column($location, 'name'));
            $data[] = [
                'category_id' => $category[$key_category]['id'],
                'year' => $row[1],
                'gender' => $row[2],
                'value' => $row[3],
                'location_id' => $location[$key_location]['id'],
            ];
        }
        PerlindunganKhususAnakRecapitulation::insert($data);
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
            '3' => 'required|integer',
            '4' => 'required|string',
        ];
    }

    /**
     * @return array
     */
    public function customValidationAttributes()
    {
        return [
            '0' => 'Kategori',
            '1' => 'Tahun',
            '2' => 'Jenis Kelamin',
            '3' => 'Hasil',
            '4' => 'Wilayah',
        ];
    }

    public function startRow(): int
    {
        return 2;
    }
}
