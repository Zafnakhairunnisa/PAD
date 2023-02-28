<?php

namespace App\Http\Livewire\Backend\Cluster3\Immunization\Recapitulation;

use App\Domains\Cluster3\Services\Immunization\ImmunizationRecapitulationService;
use Livewire\Component;

class ImmunizationRecapitulationCreateForm extends Component
{
    private ImmunizationRecapitulationService $service;

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
        ImmunizationRecapitulationService $service
    ) {
        $this->service = $service;
    }

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil membuat rekapitulasi cakupan imunisasi dasar lengkap.')
            );

        return redirect()->route('admin.cluster_3.immunization.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_3.immunization.recapitulation.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
