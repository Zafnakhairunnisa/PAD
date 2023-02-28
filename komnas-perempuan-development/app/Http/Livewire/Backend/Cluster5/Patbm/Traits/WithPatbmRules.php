<?php

namespace App\Http\Livewire\Backend\Cluster5\Patbm\Traits;

use Livewire\WithFileUploads;

trait WithPatbmRules
{
    use WithFileUploads;

    public $nama;

    public $tahun;

    public $alamat;

    public $kelurahan;

    public $kapanewon;
    
    public $kabupaten;
    
    public $medsos;
    
    public $ketua;
    
    public $no_telp;
    
    public $fasilitas;
    
    public $kegiatan;
    
    public $prestasi;

    public $documents = [];

    public $images = [];

    public $existingImages = [];

    public $existingDocuments = [];

    protected function attributes()
    {
        return [
            'nama' => 'Nama PATBM',
            'tahun' => 'Tahun Pembentukan',
            'alamat' => 'Alamat  / Dusun',
            'kelurahan' => 'Kelurahan / Kalurahan',
            'kapanewon' => 'Kapanewon / Kemantren',
            'kabupaten' => 'Kabupaten / Kota',
            'medsos' => 'Medsos',
            'ketua' => 'Ketua',
            'no_telp' => 'No Telepon',
            'fasilitas' => 'Fasilitas',
            'kegiatan' => 'Kegiatan',
            'prestasi' => 'Prestasi',
        ];
    }

    protected function rules()
    {
        $rule = 'required|string';

        return [
            'nama' => $rule,
            'tahun' => $rule,
            'alamat' => $rule,
            'kelurahan' => $rule,
            'kapanewon' => $rule,
            'kabupaten' => $rule,
            'medsos' => $rule,
            'ketua' => $rule,
            'no_telp' => $rule,
            'fasilitas' => $rule,
            'kegiatan' => $rule,
            'prestasi' => $rule,
            'documents.*' => 'mimetypes:application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel',
            'images.*' => 'mimetypes:image/jpg,image/jpeg,image/png',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        $this->resetValidation($propertyName);
    }
}
