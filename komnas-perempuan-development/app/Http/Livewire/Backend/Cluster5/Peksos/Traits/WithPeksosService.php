<?php

namespace App\Http\Livewire\Backend\Cluster5\Peksos\Traits;

use App\Domains\Cluster5\Services\Peksos\PeksosService;

trait WithPeksosService
{
    protected PeksosService $service;

    public function boot(
        PeksosService $service
    ) {
        $this->service = $service;
    }
}
