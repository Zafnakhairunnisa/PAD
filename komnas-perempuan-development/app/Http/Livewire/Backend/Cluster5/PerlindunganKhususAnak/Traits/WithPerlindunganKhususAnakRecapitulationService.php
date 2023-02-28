<?php

namespace App\Http\Livewire\Backend\Cluster5\PerlindunganKhususAnak\Traits;

use App\Domains\Cluster5\Services\PerlindunganKhususAnak\PerlindunganKhususAnakRecapitulationService;

trait WithPerlindunganKhususAnakRecapitulationService
{
    protected PerlindunganKhususAnakRecapitulationService $service;

    public function boot(
        PerlindunganKhususAnakRecapitulationService $recapitulationService
    ) {
        $this->service = $recapitulationService;
    }
}
