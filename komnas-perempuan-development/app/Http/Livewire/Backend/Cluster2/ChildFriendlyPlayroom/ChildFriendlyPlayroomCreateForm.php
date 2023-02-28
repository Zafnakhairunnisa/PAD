<?php

namespace App\Http\Livewire\Backend\Cluster2\ChildFriendlyPlayroom;

use App\Domains\Cluster2\Services\ChildFriendlyPlayroom\ChildFriendlyPlayroomService;
use Livewire\Component;
use Livewire\WithFileUploads;

class ChildFriendlyPlayroomCreateForm extends Component
{
    use WithFileUploads;

    protected ChildFriendlyPlayroomService $service;

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
        $this->service = $childFriendlyPlayroomService;
    }

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()->flash('flash_success', __('Berhasil membuat ruang bermain ramah anak.'));

        return redirect()->route('admin.cluster_2.child_friendly_playroom.index');
    }

    public function render()
    {
        return view('backend.cluster_2.child_friendly_playroom.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
