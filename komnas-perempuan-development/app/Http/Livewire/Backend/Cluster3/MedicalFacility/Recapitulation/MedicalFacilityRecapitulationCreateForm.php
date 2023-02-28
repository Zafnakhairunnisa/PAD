<?php

namespace App\Http\Livewire\Backend\Cluster3\MedicalFacility\Recapitulation;

use App\Http\Livewire\Backend\Cluster3\MedicalFacility\Traits\WithMedicalFacilityRecapitulationRules;
use App\Http\Livewire\Backend\Cluster3\MedicalFacility\Traits\WithMedicalFacilityRecapitulationService;
use Livewire\Component;

class MedicalFacilityRecapitulationCreateForm extends Component
{
    use WithMedicalFacilityRecapitulationRules,
        WithMedicalFacilityRecapitulationService;

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil membuat rekapitulasi fasilitas kesehatan ramah anak.')
            );

        return redirect()
            ->route('admin.cluster_3.medical_facility.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_3.medical_facility.recapitulation.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
