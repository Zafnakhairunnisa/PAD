<?php

namespace App\Http\Livewire\Backend\Cluster3\MedicalFacility\Traits;

use App\Domains\Cluster3\Services\MedicalFacility\MedicalFacilityRecapitulationService;

trait WithMedicalFacilityRecapitulationService
{
    protected MedicalFacilityRecapitulationService $service;

    public function boot(
        MedicalFacilityRecapitulationService $recapitulationService
    ) {
        $this->service = $recapitulationService;
    }
}
