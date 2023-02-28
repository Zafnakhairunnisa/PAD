<?php

namespace App\Http\Livewire\Backend\Cluster5\AnakKorbanTerorisme\Traits;

use App\Domains\Cluster5\Services\AnakKorbanTerorisme\AnakKorbanTerorismeRecapitulationService;

trait WithAnakKorbanTerorismeRecapitulationService
{
    protected AnakKorbanTerorismeRecapitulationService $service;

    public function boot(
        AnakKorbanTerorismeRecapitulationService $recapitulationService
    ) {
        $this->service = $recapitulationService;
    }
}
