<?php

namespace App\Http\Livewire\Backend\Cluster5\Bapas\Traits;

use App\Domains\Cluster5\Services\Bapas\BapasRecapitulationService;

trait WithBapasRecapitulationService
{
    protected BapasRecapitulationService $service;

    public function boot(
        BapasRecapitulationService $recapitulationService
    ) {
        $this->service = $recapitulationService;
    }
}
