<?php

namespace App\Http\Livewire\Backend\Cluster3\BreastFeeding\Traits;

use App\Domains\Cluster3\Services\BreastFeeding\BreastFeedingRecapitulationService;

trait WithBreastFeedingRecapitulationService
{
    protected BreastFeedingRecapitulationService $service;

    public function boot(
        BreastFeedingRecapitulationService $recapitulationService
    ) {
        $this->service = $recapitulationService;
    }
}
