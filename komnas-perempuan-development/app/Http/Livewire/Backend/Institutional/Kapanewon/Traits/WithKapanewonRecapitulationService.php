<?php

namespace App\Http\Livewire\Backend\Institutional\Kapanewon\Traits;

use App\Domains\Institutional\Services\Kapanewon\KapanewonRecapitulationService;

trait WithKapanewonRecapitulationService
{
    protected KapanewonRecapitulationService $service;

    public function boot(
        KapanewonRecapitulationService $recapitulationService
    ) {
        $this->service = $recapitulationService;
    }
}
