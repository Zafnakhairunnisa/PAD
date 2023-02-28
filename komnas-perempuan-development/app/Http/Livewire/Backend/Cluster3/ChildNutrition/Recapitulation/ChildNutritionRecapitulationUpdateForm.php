<?php

namespace App\Http\Livewire\Backend\Cluster3\ChildNutrition\Recapitulation;

use App\Domains\Cluster3\Models\ChildNutrition\ChildNutritionRecapitulation;
use App\Http\Livewire\Backend\Cluster3\ChildNutrition\Traits\WithChildNutritionRecapitulationRules;
use App\Http\Livewire\Backend\Cluster3\ChildNutrition\Traits\WithChildNutritionRecapitulationService;
use Livewire\Component;

class ChildNutritionRecapitulationUpdateForm extends Component
{
    use WithChildNutritionRecapitulationRules, WithChildNutritionRecapitulationService;

    public ChildNutritionRecapitulation $recapitulation;

    public function mount()
    {
        $this->value = $this->recapitulation->value;
        $this->year = $this->recapitulation->year;
        $this->location_id = $this->recapitulation->location_id;
        $this->category_id = $this->recapitulation->category_id;
    }

    public function submit()
    {
        $validated = $this->validate();
        $this->service->update($this->recapitulation, $validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil mengubah rekapitulasi status gizi anak.')
            );

        return redirect()->route('admin.cluster_3.child_nutrition.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_3.child_nutrition.recapitulation.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
