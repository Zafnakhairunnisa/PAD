<?php

namespace App\Http\Livewire\Backend\Cluster5\KekerasanTerhadapAnak\Traits;

use App\Domains\Cluster5\Services\KekerasanTerhadapAnak\KekerasanTerhadapAnakRecapitulationService;

trait WithKekerasanTerhadapAnakRecapitulationService
{
    protected KekerasanTerhadapAnakRecapitulationService $service;

    public function boot(
        KekerasanTerhadapAnakRecapitulationService $recapitulationService
    ) {
        $this->service = $recapitulationService;
    }
}
