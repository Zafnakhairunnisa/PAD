<?php

namespace App\Http\Livewire\Backend\Cluster3\MedicalFacility\Traits;

use App\Domains\Cluster3\Services\MedicalFacility\MedicalFacilityService;

trait WithMedicalFacilityService
{
    protected MedicalFacilityService $service;

    public function boot(
        MedicalFacilityService $service
    ) {
        $this->service = $service;
    }
}
