<?php

namespace App\Http\Livewire\Backend\Cluster1\BirthCertificate;

use App\Domains\Cluster1\Models\BirthCertificate;
use App\Domains\Cluster1\Services\BirthCertificate\BirthCertificateService;
use Livewire\Component;

class BirthCertificateUpdateForm extends Component
{
    private BirthCertificateService $service;

    public BirthCertificate $birthCertificate;

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

    public function mount()
    {
        $this->category = $this->birthCertificate->category;
        $this->gender = $this->birthCertificate->gender;
        $this->value = $this->birthCertificate->value;
        $this->year = $this->birthCertificate->year;
        $this->location_id = $this->birthCertificate->location_id;
    }

    public function submit()
    {
        $validated = $this->validate();
        $this->service->update($this->birthCertificate, $validated);

        session()->flash('flash_success', __('Berhasil membuat kepemilikan akta kelahiran.'));

        return redirect()->route('admin.cluster_1.birth_certificate.index');
    }

    public function render()
    {
        return view('backend.cluster_1.akta_kelahiran.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
