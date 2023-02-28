<?php

namespace App\Http\Livewire\Backend\Institutional\Kelurahan\Traits;

use Livewire\WithFileUploads;

trait WithKelurahanRules
{
    use WithFileUploads;

    public $kalurahan_kelurahan;
    public $kapanewon;
    public $kabupaten;
    public $tahun;
    public $ketua_gugus;
    public $no_gugus;
    public $profil_anak;
    public $forum_anak;
    public $ruang_bermain;
    public $pusat_informasi;
    public $pusat_kreatifitas;
    public $satgas_ppa;
    public $patbm;
    public $pikr;
    public $kawasan_tanpa_rokok;

    public $documents = [];

    public $images = [];

    public $existingImages = [];

    public $existingDocuments = [];

    protected function attributes()
    {
        return [
            'kalurahan_kelurahan' => 'Kalurahan / Kelurahan',
            'kapanewon' => 'Kapanewon / Kemantren',
            'kabupaten' => 'Kabupaten / Kota',
            'tahun' => 'Tahun Pembentukan',
            'ketua_gugus' => 'Ketua Gugus Tugas',
            'no_gugus' => 'Nomer Hape Gugus Tugas',
            'profil_anak' => 'Profil Anak',
            'forum_anak' => 'Forum Anak',
            'ruang_bermain' => 'Ruang Bermain Ramah Anak',
            'pusat_informasi' => 'Pusat Informasi Sahabat Anak',
            'pusat_kreatifitas' => 'Pusat Kreatifitas Anak',
            'satgas_ppa' => 'Satgas PPA',
            'patbm' => 'PATBM',
            'pikr' => 'PIKR',
            'kawasan_tanpa_rokok' => 'Kawasan Tanpa Rokok',
        ];
    }

    protected function rules()
    {
        $rule = 'required|string';

        return [
            'kalurahan_kelurahan'  => $rule,
            'kapanewon' => $rule ,
            'kabupaten' => $rule ,
            'tahun' => $rule ,
            'ketua_gugus' => $rule ,
            'no_gugus' => $rule ,
            'profil_anak' => $rule ,
            'forum_anak' => $rule ,
            'ruang_bermain' => $rule ,
            'pusat_informasi' => $rule ,
            'pusat_kreatifitas' => $rule ,
            'satgas_ppa' => $rule ,
            'patbm' => $rule ,
            'pikr' => $rule ,
            'kawasan_tanpa_rokok' => $rule ,
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
