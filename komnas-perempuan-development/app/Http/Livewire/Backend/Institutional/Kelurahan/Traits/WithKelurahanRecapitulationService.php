<?php

namespace App\Http\Livewire\Backend\Institutional\Kelurahan\Traits;

use App\Domains\Institutional\Services\Kelurahan\KelurahanRecapitulationService;

trait WithKelurahanRecapitulationService
{
    protected KelurahanRecapitulationService $service;

    public function boot(
        KelurahanRecapitulationService $recapitulationService
    ) {
        $this->service = $recapitulationService;
    }
}
