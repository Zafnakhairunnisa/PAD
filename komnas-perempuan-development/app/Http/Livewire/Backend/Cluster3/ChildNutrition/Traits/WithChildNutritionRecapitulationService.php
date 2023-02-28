<?php

namespace App\Http\Livewire\Backend\Cluster3\ChildNutrition\Traits;

use App\Domains\Cluster3\Services\ChildNutrition\ChildNutritionRecapitulationService;

trait WithChildNutritionRecapitulationService
{
    protected ChildNutritionRecapitulationService $service;

    public function boot(
        ChildNutritionRecapitulationService $recapitulationService
    ) {
        $this->service = $recapitulationService;
    }
}
