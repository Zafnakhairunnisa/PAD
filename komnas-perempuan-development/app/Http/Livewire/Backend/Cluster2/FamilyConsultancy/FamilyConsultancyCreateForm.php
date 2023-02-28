<?php

namespace App\Http\Livewire\Backend\Cluster2\FamilyConsultancy;

use App\Domains\Cluster2\Services\FamilyConsultancy\FamilyConsultancyService;
use Livewire\Component;
use Livewire\WithFileUploads;

class FamilyConsultancyCreateForm extends Component
{
    use WithFileUploads;

    protected FamilyConsultancyService $familyConsultancyService;

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
        'kategori_id' => 'Jenis',
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

    public function submit()
    {
        $validated = $this->validate();
        $this->familyConsultancyService->store($validated);

        session()->flash('flash_success', __('Berhasil membuat kelembagaan konsultasi keluarga.'));

        return redirect()->route('admin.cluster_2.family_consultancy.index');
    }

    public function render()
    {
        return view('backend.cluster_2.family_consultancy.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
