<?php

namespace App\Http\Livewire\Backend\Institutional\Kelurahan\Traits;

use App\Domains\Institutional\Services\Kelurahan\KelurahanService;

trait WithKelurahanService
{
    protected KelurahanService $service;

    public function boot(
        KelurahanService $service
    ) {
        $this->service = $service;
    }
}
