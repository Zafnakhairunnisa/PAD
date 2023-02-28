<?php

namespace App\Http\Livewire\Backend\Institutional\Kapanewon\Traits;

use App\Domains\Institutional\Services\Kapanewon\KapanewonService;

trait WithKapanewonService
{
    protected KapanewonService $service;

    public function boot(
        KapanewonService $service
    ) {
        $this->service = $service;
    }
}
