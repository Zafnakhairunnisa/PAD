<?php

namespace App\Http\Livewire\Backend\Cluster4\PusatKreatifitasAnak\Traits;

use App\Domains\Cluster4\Services\PusatKreatifitasAnak\PusatKreatifitasAnakRecapitulationService;

trait WithPusatKreatifitasAnakRecapitulationService
{
    protected PusatKreatifitasAnakRecapitulationService $service;

    public function boot(
        PusatKreatifitasAnakRecapitulationService $recapitulationService
    ) {
        $this->service = $recapitulationService;
    }
}
