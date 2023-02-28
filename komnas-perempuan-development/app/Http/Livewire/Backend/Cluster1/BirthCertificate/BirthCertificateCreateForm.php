<?php

namespace App\Http\Livewire\Backend\Cluster1\BirthCertificate;

use App\Domains\Cluster1\Services\BirthCertificate\BirthCertificateService;
use Livewire\Component;

class BirthCertificateCreateForm extends Component
{
    private BirthCertificateService $service;

    public $category;

    public $year;

    public $gender;

    public $value;

    public $location_id;

    protected $rules = [
        'category' => 'required|string',
        'gender' => 'required|in:L,P',
        'value' => 'required|numeric',
        'year' => 'required|max:4',
        'location_id' => 'required|exists:locations,id',
    ];

    protected $validationAttributes = [
        'category' => 'Kategori',
        'value' => 'Nilai',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        $this->resetValidation($propertyName);
    }

    public function boot(
        BirthCertificateService $birthCertificateService
    ) {
        $this->service = $birthCertificateService;
    }

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()->flash('flash_success', __('Berhasil membuat kepemilikan akta kelahiran.'));

        return redirect()->route('admin.cluster_1.birth_certificate.index');
    }

    public function render()
    {
        return view('backend.cluster_1.akta_kelahiran.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
