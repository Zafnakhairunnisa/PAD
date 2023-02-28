<?php

namespace App\Domains\Institutional\Imports\ChildForum;

use App\Domains\Institutional\Models\ChildForum;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ChildForumImport implements ToCollection, WithStartRow, WithChunkReading, WithValidation, WithBatchInserts
{
    use Importable;

    public function collection(Collection $rows)
    {
        $data = [];
        foreach ($rows as $row) {
            $data[] = [
                'nama' => $row[0],
                'tingkat' => $row[1],
                'surat_keputusan' => $row[2],
                'waktu_pembentukan' => $row[3],
                'nama_ketua' => $row[4],
                'nomor_telepon' => $row[5],
                'alamat' => $row[6],
                'kalurahan' => $row[7],
                'kapanewon' => $row[8],
                'kabupaten' => $row[9],
                'media_sosial' => $row[10],
                'pelatihan_kha' => $row[11],
                'partisipasi_musrenbang' => $row[12],
                'kegiatan' => $row[13],
                'prestasi' => $row[14],
                'slug' => \Str::slug($row[0]),
            ];
        }
        ChildForum::insert($data);
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
            '0' => 'required',
            '1' => 'required|in:provinsi,kabupaten,kapanewon,kalurahan,dusun',
            '2' => 'required',
            '3' => 'required|numeric',
            '4' => 'required|string',
            '5' => 'required',
            '6' => 'required',
            '7' => 'required',
            '8' => 'required',
            '9' => 'required',
            '10' => 'nullable|string',
            '11' => 'required|in:sudah,belum',
            '12' => 'required|in:sudah,belum',
            '13' => 'nullable|string',
            '14' => 'nullable|string',
        ];
    }

    /**
     * @return array
     */
    public function customValidationAttributes()
    {
        return [
            '0' => 'Nama forum anak',
            '1' => 'Tingkat forum anak',
            '2' => 'Surat keputusan',
            '3' => 'Waktu pembentukan',
            '4' => 'Nama ketua',
            '5' => 'Nomor telepon',
            '6' => 'Alamat',
            '7' => 'Kelurahan/Kelurahan',
            '8' => 'Kapanewon / Kemantren',
            '9' => 'Kabupaten / Kota',
            '10' => 'Media sosial',
            '11' => 'Pelatihan KHA',
            '12' => 'Partisipasi musrenbang',
            '13' => 'Kegiatan',
            '14' => 'Prestasi',
        ];
    }

    public function startRow(): int
    {
        return 2;
    }
}
