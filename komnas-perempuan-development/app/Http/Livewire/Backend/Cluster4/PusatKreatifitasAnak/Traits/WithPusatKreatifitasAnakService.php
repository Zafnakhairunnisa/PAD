<?php

namespace App\Http\Livewire\Backend\Cluster4\PusatKreatifitasAnak\Traits;

use App\Domains\Cluster4\Services\PusatKreatifitasAnak\PusatKreatifitasAnakService;

trait WithPusatKreatifitasAnakService
{
    protected PusatKreatifitasAnakService $service;

    public function boot(
        PusatKreatifitasAnakService $service
    ) {
        $this->service = $service;
    }
}
