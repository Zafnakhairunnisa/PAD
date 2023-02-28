<?php

namespace App\Http\Livewire\Backend\Cluster5\Bapas\Traits;

use App\Domains\Cluster5\Services\Bapas\BapasService;

trait WithBapasService
{
    protected BapasService $service;

    public function boot(
        BapasService $service
    ) {
        $this->service = $service;
    }
}
