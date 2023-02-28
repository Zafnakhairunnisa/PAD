<?php

namespace App\Http\Livewire\Backend\Cluster3\MedicalFacility;

use App\Http\Livewire\Backend\Cluster3\MedicalFacility\Traits\WithMedicalFacilityRules;
use App\Http\Livewire\Backend\Cluster3\MedicalFacility\Traits\WithMedicalFacilityService;
use Livewire\Component;

class MedicalFacilityCreateForm extends Component
{
    use WithMedicalFacilityRules,
        WithMedicalFacilityService;

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil membuat fasilitas kesehatan ramah anak.')
            );

        return redirect()
            ->route('admin.cluster_3.medical_facility.index');
    }

    public function render()
    {
        return view('backend.cluster_3.medical_facility.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
