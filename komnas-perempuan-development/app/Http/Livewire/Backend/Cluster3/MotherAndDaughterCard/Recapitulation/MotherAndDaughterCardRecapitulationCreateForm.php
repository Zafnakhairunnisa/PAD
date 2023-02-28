<?php

namespace App\Http\Livewire\Backend\Cluster3\MotherAndDaughterCard\Recapitulation;

use App\Domains\Cluster3\Services\MotherAndDaughterCard\MotherAndDaughterCardRecapitulationService;
use Livewire\Component;

class MotherAndDaughterCardRecapitulationCreateForm extends Component
{
    private MotherAndDaughterCardRecapitulationService $service;

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
        MotherAndDaughterCardRecapitulationService $service
    ) {
        $this->service = $service;
    }

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()->flash('flash_success', __('Berhasil membuat rekapitulasi kartu ibu dan anak.'));

        return redirect()->route('admin.cluster_3.mother_and_daughter_card.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_3.mother_and_daughter_card.recapitulation.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
