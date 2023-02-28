<?php

namespace App\Http\Livewire\Backend\Cluster5\Patbm\Traits;

use App\Domains\Cluster5\Services\Patbm\PatbmService;

trait WithPatbmService
{
    protected PatbmService $service;

    public function boot(
        PatbmService $service
    ) {
        $this->service = $service;
    }
}
