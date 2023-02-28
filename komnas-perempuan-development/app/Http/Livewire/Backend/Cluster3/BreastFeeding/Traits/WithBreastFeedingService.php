<?php

namespace App\Http\Livewire\Backend\Cluster3\BreastFeeding\Traits;

use App\Domains\Cluster3\Services\BreastFeeding\BreastFeedingService;

trait WithBreastFeedingService
{
    protected BreastFeedingService $service;

    public function boot(
        BreastFeedingService $service
    ) {
        $this->service = $service;
    }
}
