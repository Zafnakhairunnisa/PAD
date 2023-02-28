<?php

namespace App\Http\Livewire\Backend\Cluster3\MaternalDeath\Recapitulation;

use App\Domains\Cluster3\Services\MaternalDeath\MaternalDeathRecapitulationService;
use Livewire\Component;

class MaternalDeathRecapitulationCreateForm extends Component
{
    private MaternalDeathRecapitulationService $service;

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
        MaternalDeathRecapitulationService $service
    ) {
        $this->service = $service;
    }

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()->flash('flash_success', __('Berhasil membuat rekapitulasi kematian ibu melahirkan.'));

        return redirect()->route('admin.cluster_3.maternal_death.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_3.maternal_death.recapitulation.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
