<?php

namespace App\Http\Livewire\Backend\Cluster3\Immunization\Recapitulation;

use App\Domains\Cluster3\Models\Immunization\ImmunizationRecapitulation;
use App\Domains\Cluster3\Services\Immunization\ImmunizationRecapitulationService;
use Livewire\Component;

class ImmunizationRecapitulationUpdateForm extends Component
{
    private ImmunizationRecapitulationService $service;

    public ImmunizationRecapitulation $recapitulation;

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
        ImmunizationRecapitulationService $recapitulationService
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

        session()
            ->flash(
                'flash_success',
                __('Berhasil mengubah rekapitulasi cakupan imunisasi dasar lengkap.')
            );

        return redirect()->route('admin.cluster_3.immunization.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_3.immunization.recapitulation.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
