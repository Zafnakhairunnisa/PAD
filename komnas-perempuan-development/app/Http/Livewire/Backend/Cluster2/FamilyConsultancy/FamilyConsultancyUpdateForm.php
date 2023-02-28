<?php

namespace App\Http\Livewire\Backend\Cluster2\FamilyConsultancy;

use App\Domains\Cluster2\Models\FamilyConsultancy\FamilyConsultancy;
use App\Domains\Cluster2\Services\FamilyConsultancy\FamilyConsultancyService;
use Livewire\Component;
use Livewire\WithFileUploads;

class FamilyConsultancyUpdateForm extends Component
{
    use WithFileUploads;

    protected FamilyConsultancyService $familyConsultancyService;

    public FamilyConsultancy $familyConsultancy;

    public $nama;

    public $kategori_id;

    public $alamat;

    public $kalurahan;

    public $kapanewon;

    public $location_id;

    public $media_sosial;

    public $nama_pimpinan;

    public $no_telepon;

    public $no_sertifikasi;

    public $kegiatan;

    public $klien;

    public $fasilitas;

    public $documents = [];

    public $images = [];

    public $existingImages = [];

    public $existingDocuments = [];

    protected $rules = [
        'nama' => 'required|string',
        'kategori_id' => 'required|exists:family_consultancy_categories,id',
        'alamat' => 'required|string',
        'kalurahan' => 'required|string',
        'kapanewon' => 'required|string',
        'location_id' => 'required|exists:locations,id',
        'media_sosial' => 'required|string',
        'nama_pimpinan' => 'required|string',
        'no_telepon' => 'required|string',
        'no_sertifikasi' => 'required|string',
        'kegiatan' => 'required|string',
        'klien' => 'required|string',
        'fasilitas' => 'required|string',
        'documents.*' => 'mimetypes:application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel',
        'images.*' => 'mimetypes:image/jpg,image/jpeg,image/png',
    ];

    protected $validationAttributes = [
        'nama' => 'Nama lembaga',
        'nama_pimpinan' => 'Nama pimpinan',
        'no_telepon' => 'Nomor telepon',
        'no_sertifikasi' => 'Nomor sertifikasi',
        'klien' => 'Jumlah klien per tahun',
        'fasilitas' => 'Fasilitas',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        $this->resetValidation($propertyName);
    }

    public function boot(FamilyConsultancyService $familyConsultancyService)
    {
        $this->familyConsultancyService = $familyConsultancyService;
    }

    public function mount()
    {
        $this->nama = $this->familyConsultancy->nama;
        $this->kategori_id = $this->familyConsultancy->kategori_id;
        $this->alamat = $this->familyConsultancy->alamat;
        $this->kalurahan = $this->familyConsultancy->kalurahan;
        $this->kapanewon = $this->familyConsultancy->kapanewon;
        $this->location_id = $this->familyConsultancy->location_id;
        $this->media_sosial = $this->familyConsultancy->media_sosial;
        $this->nama_pimpinan = $this->familyConsultancy->nama_pimpinan;
        $this->no_telepon = $this->familyConsultancy->no_telepon;
        $this->no_sertifikasi = $this->familyConsultancy->no_sertifikasi;
        $this->kegiatan = $this->familyConsultancy->kegiatan;
        $this->klien = $this->familyConsultancy->klien;
        $this->fasilitas = $this->familyConsultancy->fasilitas;

        $this->existingImages = $this->familyConsultancy->images->map(function ($image) {
            return mapFilepondImages($image);
        });
        $this->existingDocuments = $this->familyConsultancy->documents->map(function ($document) {
            return mapFilepondDocument($document);
        });
    }

    public function submit()
    {
        $validated = $this->validate();
        $this->familyConsultancyService->update($this->familyConsultancy, $validated);

        session()->flash('flash_success', __('Berhasil mengubah lembaga konsultasi keluarga.'));

        return redirect()->route('admin.cluster_2.family_consultancy.index');
    }

    public function render()
    {
        return view('backend.cluster_2.family_consultancy.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
