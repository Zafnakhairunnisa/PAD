<?php

namespace App\Http\Livewire\Backend\Cluster3\InfantMortality\Recapitulation;

use App\Domains\Cluster3\Services\InfantMortality\InfantMortalityRecapitulationService;
use Livewire\Component;

class InfantMortalityRecapitulationCreateForm extends Component
{
    private InfantMortalityRecapitulationService $service;

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
        InfantMortalityRecapitulationService $service
    ) {
        $this->service = $service;
    }

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()->flash('flash_success', __('Berhasil membuat rekapitulasi angka kematian bayi.'));

        return redirect()->route('admin.cluster_3.infant_mortality.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_3.infant_mortality.recapitulation.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
