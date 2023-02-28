<?php

namespace App\Http\Livewire\Backend\Cluster3\ChildNutrition\Recapitulation;

use App\Http\Livewire\Backend\Cluster3\ChildNutrition\Traits\WithChildNutritionRecapitulationRules;
use App\Http\Livewire\Backend\Cluster3\ChildNutrition\Traits\WithChildNutritionRecapitulationService;
use Livewire\Component;

class ChildNutritionRecapitulationCreateForm extends Component
{
    use WithChildNutritionRecapitulationRules, WithChildNutritionRecapitulationService;

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil membuat rekapitulasi status gizi anak.')
            );

        return redirect()
            ->route('admin.cluster_3.child_nutrition.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_3.child_nutrition.recapitulation.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
