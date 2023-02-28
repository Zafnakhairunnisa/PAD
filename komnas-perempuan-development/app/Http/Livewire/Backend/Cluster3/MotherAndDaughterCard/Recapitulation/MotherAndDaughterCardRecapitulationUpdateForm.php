<?php

namespace App\Http\Livewire\Backend\Cluster3\MotherAndDaughterCard\Recapitulation;

use App\Domains\Cluster3\Models\MotherAndDaughterCard\MotherAndDaughterCardRecapitulation;
use App\Domains\Cluster3\Services\MotherAndDaughterCard\MotherAndDaughterCardRecapitulationService;
use Livewire\Component;

class MotherAndDaughterCardRecapitulationUpdateForm extends Component
{
    private MotherAndDaughterCardRecapitulationService $service;

    public MotherAndDaughterCardRecapitulation $recapitulation;

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
        MotherAndDaughterCardRecapitulationService $recapitulationService
    ) {
        $this->service = $recapitulationService;
    }

    public function mount()
    {
        $this->value = $this->recapitulation->value;
        $this->year = $this->recapitulation->year;
        $this->location_id = $this->recapitulation->location_id;
    }

    public function submit()
    {
        $validated = $this->validate();
        $this->service->update($this->recapitulation, $validated);

        session()->flash('flash_success', __('Berhasil mengubah rekapitulasi kartu ibu dan anak.'));

        return redirect()->route('admin.cluster_3.mother_and_daughter_card.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_3.mother_and_daughter_card.recapitulation.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
