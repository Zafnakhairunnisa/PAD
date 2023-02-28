<?php

namespace App\Http\Livewire\Backend\Cluster2\PerkawinanAnak;

use App\Domains\Cluster2\Services\PerkawinanAnak\PerkawinanAnakService;
use Livewire\Component;

class PerkawinanAnakCreateForm extends Component
{
    private PerkawinanAnakService $service;

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

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()->flash('flash_success', __('Berhasil membuat perkawinan anak.'));

        return redirect()->route('admin.cluster_2.perkawinan_anak.index');
    }

    public function render()
    {
        return view('backend.cluster_2.perkawinan_anak.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
