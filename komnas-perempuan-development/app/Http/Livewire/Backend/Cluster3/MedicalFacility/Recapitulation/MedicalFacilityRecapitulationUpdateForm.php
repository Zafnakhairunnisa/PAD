<?php

namespace App\Http\Livewire\Backend\Cluster3\MedicalFacility\Recapitulation;

use App\Domains\Cluster3\Models\MedicalFacility\MedicalFacilityRecapitulation;
use App\Http\Livewire\Backend\Cluster3\MedicalFacility\Traits\WithMedicalFacilityRecapitulationRules;
use App\Http\Livewire\Backend\Cluster3\MedicalFacility\Traits\WithMedicalFacilityRecapitulationService;
use Livewire\Component;

class MedicalFacilityRecapitulationUpdateForm extends Component
{
    use WithMedicalFacilityRecapitulationRules,
        WithMedicalFacilityRecapitulationService;

    public MedicalFacilityRecapitulation $recapitulation;

    public function mount()
    {
        $this->value = $this->recapitulation->value;
        $this->year = $this->recapitulation->year;
        $this->location_id = $this->recapitulation->location_id;
        $this->category_id = $this->recapitulation->category_id;
    }

    public function submit()
    {
        $validated = $this->validate();
        $this->service->update($this->recapitulation, $validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil mengubah rekapitulasi fasilitas kesehatan ramah anak.')
            );

        return redirect()->route('admin.cluster_3.medical_facility.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_3.medical_facility.recapitulation.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
