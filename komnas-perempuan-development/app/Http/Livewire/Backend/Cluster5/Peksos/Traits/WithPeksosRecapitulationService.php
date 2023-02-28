<?php

namespace App\Http\Livewire\Backend\Cluster5\Peksos\Traits;

use App\Domains\Cluster5\Services\Peksos\PeksosRecapitulationService;

trait WithPeksosRecapitulationService
{
    protected PeksosRecapitulationService $service;

    public function boot(
        PeksosRecapitulationService $recapitulationService
    ) {
        $this->service = $recapitulationService;
    }
}
