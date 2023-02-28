<?php

namespace App\Http\Livewire\Backend\Cluster3\Sanitation\Traits;

use App\Domains\Cluster3\Services\Sanitation\SanitationRecapitulationService;

trait WithSanitationRecapitulationService
{
    protected SanitationRecapitulationService $service;

    public function boot(
        SanitationRecapitulationService $recapitulationService
    ) {
        $this->service = $recapitulationService;
    }
}
