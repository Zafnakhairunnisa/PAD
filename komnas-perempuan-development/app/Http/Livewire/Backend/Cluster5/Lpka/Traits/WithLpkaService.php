<?php

namespace App\Http\Livewire\Backend\Cluster5\Lpka\Traits;

use App\Domains\Cluster5\Services\Lpka\LpkaService;

trait WithLpkaService
{
    protected LpkaService $service;

    public function boot(
        LpkaService $service
    ) {
        $this->service = $service;
    }
}
