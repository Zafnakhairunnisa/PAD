<?php

namespace App\Http\Livewire\Backend\Cluster5\Lpka\Traits;

use App\Domains\Cluster5\Services\Lpka\LpkaRecapitulationService;

trait WithLpkaRecapitulationService
{
    protected LpkaRecapitulationService $service;

    public function boot(
        LpkaRecapitulationService $recapitulationService
    ) {
        $this->service = $recapitulationService;
    }
}
