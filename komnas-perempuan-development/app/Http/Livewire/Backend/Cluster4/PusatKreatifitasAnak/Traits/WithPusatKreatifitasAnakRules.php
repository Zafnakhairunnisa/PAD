<?php

namespace App\Http\Livewire\Backend\Cluster4\PusatKreatifitasAnak\Traits;

trait WithPusatKreatifitasAnakRules
{
    public $nama;

    public $bidang;

    public $alamat;

    public $kalurahan;

    public $kapanewon;

    public $location_id;

    public $legalitas;

    public $papan_nama;

    public $pelatihan_kha;

    public $kegiatan;

    public $prestasi;

    public $documents = [];

    public $images = [];

    protected function rules()
    {
        $rule = 'required|string';

        return [
            'nama'  => $rule,
            'bidang'  => $rule,
            'alamat'  => $rule,
            'kalurahan'  => $rule,
            'kapanewon'  => $rule,
            'location_id'  => 'required|exists:locations,id',
            'legalitas'  => $rule,
            'papan_nama'  => $rule,
            'pelatihan_kha'  => $rule,
            'kegiatan'  => $rule,
            'prestasi'  => $rule,
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
