<?php

namespace App\Http\Livewire\Backend\Cluster5\Kapanewon\Traits;

use App\Domains\Cluster5\Services\Kapanewon\KapanewonService;

trait WithKapanewonService
{
    protected KapanewonService $service;

    public function boot(
        KapanewonService $service
    ) {
        $this->service = $service;
    }
}
