<?php

namespace App\Http\Livewire\Backend\Cluster5\Pengadilan\Traits;

use App\Domains\Cluster5\Services\Pengadilan\PengadilanRecapitulationService;

trait WithPengadilanRecapitulationService
{
    protected PengadilanRecapitulationService $service;

    public function boot(
        PengadilanRecapitulationService $recapitulationService
    ) {
        $this->service = $recapitulationService;
    }
}
