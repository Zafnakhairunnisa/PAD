<?php

namespace App\Http\Livewire\Backend\Cluster5\PolisiDiy\Traits;

use App\Domains\Cluster5\Services\PolisiDiy\PolisiDiyRecapitulationService;

trait WithPolisiDiyRecapitulationService
{
    protected PolisiDiyRecapitulationService $service;

    public function boot(
        PolisiDiyRecapitulationService $recapitulationService
    ) {
        $this->service = $recapitulationService;
    }
}
