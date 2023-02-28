<?php

namespace App\Http\Livewire\Backend\Cluster2\ChildFriendlyPlayroom;

use App\Domains\Cluster2\Models\ChildFriendlyPlayroom\ChildFriendlyPlayroom;
use App\Domains\Cluster2\Services\ChildFriendlyPlayroom\ChildFriendlyPlayroomService;
use Livewire\Component;
use Livewire\WithFileUploads;

class ChildFriendlyPlayroomUpdateForm extends Component
{
    use WithFileUploads;

    protected ChildFriendlyPlayroomService $childFriendlyPlayroomService;

    public ChildFriendlyPlayroom $childFriendlyPlayroom;

    public $nama;

    public $alamat;

    public $kalurahan;

    public $kapanewon;

    public $location_id;

    public $fasilitas;

    public $sertifikasi;

    public $jenis;

    public $documents = [];

    public $images = [];

    public $existingImages = [];

    public $existingDocuments = [];

    protected $rules = [
        'nama' => 'required|string',
        'alamat' => 'required|string',
        'kalurahan' => 'required|string',
        'kapanewon' => 'required|string',
        'location_id' => 'required|exists:locations,id',
        'fasilitas' => 'required|string',
        'sertifikasi' => 'required|in:yes,no',
        'jenis' => 'required|in:dalam_ruang,luar_ruang',
        'documents.*' => 'mimetypes:application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel',
        'images.*' => 'mimetypes:image/jpg,image/jpeg,image/png',
    ];

    protected $validationAttributes = [
        'nama' => 'Nama RBRA',
        'sertifikasi' => 'Sertifikasi',
        'jenis' => 'Jenis',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        $this->resetValidation($propertyName);
    }

    public function boot(ChildFriendlyPlayroomService $childFriendlyPlayroomService)
    {
        $this->childFriendlyPlayroomService = $childFriendlyPlayroomService;
    }

    public function mount()
    {
        $this->nama = $this->childFriendlyPlayroom->nama;
        $this->alamat = $this->childFriendlyPlayroom->alamat;
        $this->kalurahan = $this->childFriendlyPlayroom->kalurahan;
        $this->kapanewon = $this->childFriendlyPlayroom->kapanewon;
        $this->location_id = $this->childFriendlyPlayroom->location_id;
        $this->fasilitas = $this->childFriendlyPlayroom->fasilitas;
        $this->sertifikasi = $this->childFriendlyPlayroom->sertifikasi;
        $this->jenis = $this->childFriendlyPlayroom->jenis;

        $this->existingImages = $this->childFriendlyPlayroom->images->map(function ($image) {
            return mapFilepondImages($image);
        });
        $this->existingDocuments = $this->childFriendlyPlayroom->documents->map(function ($document) {
            return mapFilepondDocument($document);
        });
    }

    public function submit()
    {
        $validated = $this->validate();
        $this->childFriendlyPlayroomService->update($this->childFriendlyPlayroom, $validated);

        session()->flash('flash_success', __('Berhasil mengubah ruang bermain ramah anak.'));

        return redirect()->route('admin.cluster_2.child_friendly_playroom.index');
    }

    public function render()
    {
        return view('backend.cluster_2.child_friendly_playroom.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
