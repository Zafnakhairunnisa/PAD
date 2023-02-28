<?php

namespace App\Http\Livewire\Backend\Cluster2\ChildWelfareInstitution;

use App\Domains\Cluster2\Models\ChildWelfareInstitution\ChildWelfareInstitution;
use App\Domains\Cluster2\Services\ChildWelfareInstitution\ChildWelfareInstitutionService;
use Livewire\Component;
use Livewire\WithFileUploads;

class ChildWelfareInstitutionUpdateForm extends Component
{
    use WithFileUploads;

    protected ChildWelfareInstitutionService $service;

    public ChildWelfareInstitution $childWelfareInstitution;

    public $nama;

    public $jenis_id;

    public $tahun_berdiri;

    public $legalitas;

    public $akreditasi;

    public $dusun;

    public $kalurahan;

    public $kapanewon;

    public $location_id;

    public $media_sosial;

    public $nama_pimpinan;

    public $no_telepon;

    public $jumlah_anak_asuh;

    public $fasilitas;

    public $kegiatan;

    public $documents = [];

    public $images = [];

    public $existingImages = [];

    public $existingDocuments = [];

    protected $rules = [
        'nama' => 'required|string',
        'jenis_id' => 'required|string',
        'tahun_berdiri' => 'required|string',
        'legalitas' => 'required|string',
        'akreditasi' => 'required|string',
        'dusun' => 'required|string',
        'kalurahan' => 'required|string',
        'kapanewon' => 'required|string',
        'location_id' => 'required|exists:locations,id',
        'media_sosial' => 'required|string',
        'nama_pimpinan' => 'required|string',
        'no_telepon' => 'required|numeric',
        'jumlah_anak_asuh' => 'required|numeric',
        'fasilitas' => 'required|string',
        'kegiatan' => 'required|string',
        'documents.*' => 'mimetypes:application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel',
        'images.*' => 'mimetypes:image/jpg,image/jpeg,image/png',
    ];

    protected $validationAttributes = [
        'nama' => 'Nama lembaga',
        'jenis_id' => 'Jenis lembaga',
        'tahun_berdiri' => 'Tahun berdiri',
        'legalitas' => 'Legalitas',
        'akreditasi' => 'Akreditasi',
        'dusun' => 'Dusun / Jalan',
        'nama_pimpinan' => 'Nama Pimpinan',
        'no_telepon' => 'Nomor Telepon',
        'jumlah_anak_asuh' => 'Jumlah anak asuh',
        'documents.*' => 'mimetypes:application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel',
        'images.*' => 'mimetypes:image/jpg,image/jpeg,image/png',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        $this->resetValidation($propertyName);
    }

    public function boot(ChildWelfareInstitutionService $service)
    {
        $this->service = $service;
    }

    public function mount()
    {
        $this->nama = $this->childWelfareInstitution->nama;
        $this->jenis_id = $this->childWelfareInstitution->jenis_id;
        $this->tahun_berdiri = $this->childWelfareInstitution->tahun_berdiri;
        $this->legalitas = $this->childWelfareInstitution->legalitas;
        $this->akreditasi = $this->childWelfareInstitution->akreditasi;
        $this->dusun = $this->childWelfareInstitution->dusun;
        $this->kalurahan = $this->childWelfareInstitution->kalurahan;
        $this->kapanewon = $this->childWelfareInstitution->kapanewon;
        $this->location_id = $this->childWelfareInstitution->location_id;
        $this->media_sosial = $this->childWelfareInstitution->media_sosial;
        $this->nama_pimpinan = $this->childWelfareInstitution->nama_pimpinan;
        $this->no_telepon = $this->childWelfareInstitution->no_telepon;
        $this->jumlah_anak_asuh = $this->childWelfareInstitution->jumlah_anak_asuh;
        $this->fasilitas = $this->childWelfareInstitution->fasilitas;
        $this->kegiatan = $this->childWelfareInstitution->kegiatan;

        $this->existingImages = $this->childWelfareInstitution->images->map(function ($image) {
            return mapFilepondImages($image);
        });
        $this->existingDocuments = $this->childWelfareInstitution->documents->map(function ($document) {
            return mapFilepondDocument($document);
        });
    }

    public function submit()
    {
        $validated = $this->validate();
        $this->service->update($this->childWelfareInstitution, $validated);

        session()->flash('flash_success', __('Berhasil mengubah lembaga kesejahteraan sosial anak.'));

        return redirect()->route('admin.cluster_2.child_welfare_institution.index');
    }

    public function render()
    {
        return view('backend.cluster_2.child_welfare_institution.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
