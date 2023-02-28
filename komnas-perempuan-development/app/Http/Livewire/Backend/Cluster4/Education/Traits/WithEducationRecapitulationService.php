<?php

namespace App\Http\Livewire\Backend\Cluster4\Education\Traits;

use App\Domains\Cluster4\Services\Education\EducationRecapitulationService;

trait WithEducationRecapitulationService
{
    protected EducationRecapitulationService $service;

    public function boot(
        EducationRecapitulationService $recapitulationService
    ) {
        $this->service = $recapitulationService;
    }
}
