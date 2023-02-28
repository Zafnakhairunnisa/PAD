<?php

namespace App\Http\Livewire\Backend\Cluster5\Kapanewon\Traits;

use App\Domains\Cluster5\Services\Kapanewon\KapanewonRecapitulationService;

trait WithKapanewonRecapitulationService
{
    protected KapanewonRecapitulationService $service;

    public function boot(
        KapanewonRecapitulationService $recapitulationService
    ) {
        $this->service = $recapitulationService;
    }
}
