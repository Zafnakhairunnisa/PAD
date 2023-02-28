<?php

namespace App\Http\Livewire\Backend\Cluster5\PolisiDiy\Traits;

use App\Domains\Cluster5\Services\PolisiDiy\PolisiDiyService;

trait WithPolisiDiyService
{
    protected PolisiDiyService $service;

    public function boot(
        PolisiDiyService $service
    ) {
        $this->service = $service;
    }
}
