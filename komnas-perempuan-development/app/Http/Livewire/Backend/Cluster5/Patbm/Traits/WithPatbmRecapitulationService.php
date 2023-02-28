<?php

namespace App\Http\Livewire\Backend\Cluster5\Patbm\Traits;

use App\Domains\Cluster5\Services\Patbm\PatbmRecapitulationService;

trait WithPatbmRecapitulationService
{
    protected PatbmRecapitulationService $service;

    public function boot(
        PatbmRecapitulationService $recapitulationService
    ) {
        $this->service = $recapitulationService;
    }
}
