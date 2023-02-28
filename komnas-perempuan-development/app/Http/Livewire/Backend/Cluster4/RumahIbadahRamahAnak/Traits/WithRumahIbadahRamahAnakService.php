<?php

namespace App\Http\Livewire\Backend\Cluster4\RumahIbadahRamahAnak\Traits;

use App\Domains\Cluster4\Services\RumahIbadahRamahAnak\RumahIbadahRamahAnakService;

trait WithRumahIbadahRamahAnakService
{
    protected RumahIbadahRamahAnakService $service;

    public function boot(
        RumahIbadahRamahAnakService $service
    ) {
        $this->service = $service;
    }
}
