<?php

namespace App\Http\Livewire\Backend\Cluster5\AnakAids\Traits;

use App\Domains\Cluster5\Services\AnakAids\AnakAidsRecapitulationService;

trait WithAnakAidsRecapitulationService
{
    protected AnakAidsRecapitulationService $service;

    public function boot(
        AnakAidsRecapitulationService $recapitulationService
    ) {
        $this->service = $recapitulationService;
    }
}
