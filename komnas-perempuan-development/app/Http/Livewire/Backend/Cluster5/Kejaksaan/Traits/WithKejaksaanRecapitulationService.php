<?php

namespace App\Http\Livewire\Backend\Cluster5\Kejaksaan\Traits;

use App\Domains\Cluster5\Services\Kejaksaan\KejaksaanRecapitulationService;

trait WithKejaksaanRecapitulationService
{
    protected KejaksaanRecapitulationService $service;

    public function boot(
        KejaksaanRecapitulationService $recapitulationService
    ) {
        $this->service = $recapitulationService;
    }
}
