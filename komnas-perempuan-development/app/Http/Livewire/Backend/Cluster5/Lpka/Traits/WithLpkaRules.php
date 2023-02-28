<?php

namespace App\Http\Livewire\Backend\Cluster5\Lpka\Traits;

use Livewire\WithFileUploads;

trait WithLpkaRules
{
    use WithFileUploads;

    public $daftar_sop;

    public $sarana_prasarana;

    public $jenis_ruangan;

    public $alamat;

    public $documents = [];

    public $images = [];

    public $existingImages = [];

    public $existingDocuments = [];

    protected function attributes()
    {
        return [
            'jenis_ruangan' => 'Jenis Ruangan',
            'sarana_prasarana' => 'Sarana prasarana',
            'daftar_sop' => 'Daftar SOP penanganan ABH',
        ];
    }

    protected function rules()
    {
        $rule = 'required|string';

        return [
            'daftar_sop'  => $rule,
            'jenis_ruangan'  => 'required',
            'sarana_prasarana'  => 'required',
            'alamat'  => $rule,
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
