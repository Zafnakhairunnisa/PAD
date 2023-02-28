<?php

namespace App\Http\Livewire\Backend\Cluster5\Bprs\Traits;

use App\Domains\Cluster5\Services\Bprs\BprsRecapitulationService;

trait WithBprsRecapitulationService
{
    protected BprsRecapitulationService $service;

    public function boot(
        BprsRecapitulationService $recapitulationService
    ) {
        $this->service = $recapitulationService;
    }
}
