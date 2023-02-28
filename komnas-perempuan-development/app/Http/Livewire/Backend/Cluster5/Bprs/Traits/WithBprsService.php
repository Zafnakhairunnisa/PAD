<?php

namespace App\Http\Livewire\Backend\Cluster5\Bprs\Traits;

use App\Domains\Cluster5\Services\Bprs\BprsService;

trait WithBprsService
{
    protected BprsService $service;

    public function boot(
        BprsService $service
    ) {
        $this->service = $service;
    }
}
