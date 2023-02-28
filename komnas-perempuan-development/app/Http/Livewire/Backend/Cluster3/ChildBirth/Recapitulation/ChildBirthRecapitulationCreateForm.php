<?php

namespace App\Http\Livewire\Backend\Cluster3\ChildBirth\Recapitulation;

use App\Domains\Cluster3\Services\ChildBirth\ChildBirthRecapitulationService;
use Livewire\Component;

class ChildBirthRecapitulationCreateForm extends Component
{
    private ChildBirthRecapitulationService $service;

    public $year;

    public $value;

    public $location_id;

    protected $validationAttributes = [
        'value' => 'Nilai',
    ];

    protected function rules()
    {
        return [
            'value' => 'required|numeric',
            'year' => 'required|max:4',
            'location_id' => 'required|exists:locations,id',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        $this->resetValidation($propertyName);
    }

    public function boot(
        ChildBirthRecapitulationService $service
    ) {
        $this->service = $service;
    }

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()->flash('flash_success', __('Berhasil membuat rekapitulasi persalinan di fasilitas kesehatan.'));

        return redirect()->route('admin.cluster_3.child_birth.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_3.child_birth.recapitulation.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
