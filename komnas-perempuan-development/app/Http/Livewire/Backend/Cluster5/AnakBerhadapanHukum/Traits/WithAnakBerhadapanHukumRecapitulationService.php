<?php

namespace App\Http\Livewire\Backend\Cluster5\AnakBerhadapanHukum\Traits;

use App\Domains\Cluster5\Services\AnakBerhadapanHukum\AnakBerhadapanHukumRecapitulationService;

trait WithAnakBerhadapanHukumRecapitulationService
{
    protected AnakBerhadapanHukumRecapitulationService $service;

    public function boot(
        AnakBerhadapanHukumRecapitulationService $recapitulationService
    ) {
        $this->service = $recapitulationService;
    }
}
