<?php

namespace App\Http\Livewire\Backend\Cluster4\RumahIbadahRamahAnak\Traits;

trait WithRumahIbadahRamahAnakRules
{
    public $nama;

    public $jenis;

    public $alamat;

    public $kalurahan;

    public $kapanewon;

    public $location_id;

    public $ruang_bermain;

    public $pojok_bacaan;

    public $kawasan_tanpa_rokok;

    public $layanan_ramah_anak;

    public $kegiatan_kreatif;

    public $documents = [];

    public $images = [];

    protected function rules()
    {
        $rule = 'required|string';
        $enumRule = $rule.'|in:ada,tidak_ada';

        return [
            'nama'  => $rule,
            'jenis'  => $rule,
            'alamat'  => $rule,
            'kalurahan'  => $rule,
            'kapanewon'  => $rule,
            'location_id'  => 'required|exists:locations,id',
            'ruang_bermain'  => $enumRule,
            'pojok_bacaan'  => $enumRule,
            'kawasan_tanpa_rokok'  => $enumRule,
            'layanan_ramah_anak'  => $enumRule,
            'kegiatan_kreatif'  => $enumRule,
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
