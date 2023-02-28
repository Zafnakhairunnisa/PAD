<?php

namespace App\Http\Livewire\Backend\Cluster5\Kejaksaan\Traits;

use App\Domains\Cluster5\Services\Kejaksaan\KejaksaanService;

trait WithKejaksaanService
{
    protected KejaksaanService $service;

    public function boot(
        KejaksaanService $service
    ) {
        $this->service = $service;
    }
}
