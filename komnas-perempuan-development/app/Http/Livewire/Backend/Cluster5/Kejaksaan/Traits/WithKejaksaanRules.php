<?php

namespace App\Http\Livewire\Backend\Cluster5\Kejaksaan\Traits;

use Livewire\WithFileUploads;

trait WithKejaksaanRules
{
    use WithFileUploads;

    public $daftar_sop;

    public $fasilitas;

    public $alamat;

    public $documents = [];

    public $images = [];

    public $existingImages = [];

    public $existingDocuments = [];

    protected function attributes()
    {
        return [
            'fasilitas' => 'Fasilitas Pemeriksaan Anak',
            'daftar_sop' => 'Daftar SOP penanganan ABH',
        ];
    }

    protected function rules()
    {
        $rule = 'required|string';

        return [
            'daftar_sop'  => $rule,
            'fasilitas'  => 'required',
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
