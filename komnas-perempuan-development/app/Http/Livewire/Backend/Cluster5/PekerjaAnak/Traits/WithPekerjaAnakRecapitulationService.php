<?php

namespace App\Http\Livewire\Backend\Cluster5\PekerjaAnak\Traits;

use App\Domains\Cluster5\Services\PekerjaAnak\PekerjaAnakRecapitulationService;

trait WithPekerjaAnakRecapitulationService
{
    protected PekerjaAnakRecapitulationService $service;

    public function boot(
        PekerjaAnakRecapitulationService $recapitulationService
    ) {
        $this->service = $recapitulationService;
    }
}
