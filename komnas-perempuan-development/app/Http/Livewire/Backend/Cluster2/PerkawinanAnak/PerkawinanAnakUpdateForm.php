<?php

namespace App\Http\Livewire\Backend\Cluster2\PerkawinanAnak;

use App\Domains\Cluster2\Models\PerkawinanAnak;
use App\Domains\Cluster2\Services\PerkawinanAnak\PerkawinanAnakService;
use Livewire\Component;

class PerkawinanAnakUpdateForm extends Component
{
    private PerkawinanAnakService $service;

    public PerkawinanAnak $birthCertificate;

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
        PerkawinanAnakService $birthCertificateService
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

        session()->flash('flash_success', __('Berhasil membuat perkawinan anak.'));

        return redirect()->route('admin.cluster_2.perkawinan_anak.index');
    }

    public function render()
    {
        return view('backend.cluster_2.perkawinan_anak.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
