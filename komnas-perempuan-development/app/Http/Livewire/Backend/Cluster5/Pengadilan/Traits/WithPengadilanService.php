<?php

namespace App\Http\Livewire\Backend\Cluster5\Pengadilan\Traits;

use App\Domains\Cluster5\Services\Pengadilan\PengadilanService;

trait WithPengadilanService
{
    protected PengadilanService $service;

    public function boot(
        PengadilanService $service
    ) {
        $this->service = $service;
    }
}
