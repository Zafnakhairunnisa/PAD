<?php

namespace App\Http\Livewire\Backend\Cluster4\RumahIbadahRamahAnak\Traits;

use App\Domains\Cluster4\Services\RumahIbadahRamahAnak\RumahIbadahRamahAnakRecapitulationService;

trait WithRumahIbadahRamahAnakRecapitulationService
{
    protected RumahIbadahRamahAnakRecapitulationService $service;

    public function boot(
        RumahIbadahRamahAnakRecapitulationService $recapitulationService
    ) {
        $this->service = $recapitulationService;
    }
}
