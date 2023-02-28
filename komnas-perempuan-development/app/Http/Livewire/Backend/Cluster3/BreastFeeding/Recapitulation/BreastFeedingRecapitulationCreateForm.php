<?php

namespace App\Http\Livewire\Backend\Cluster3\BreastFeeding\Recapitulation;

use App\Http\Livewire\Backend\Cluster3\BreastFeeding\Traits\WithBreastFeedingRecapitulationRules;
use App\Http\Livewire\Backend\Cluster3\BreastFeeding\Traits\WithBreastFeedingRecapitulationService;
use Livewire\Component;

class BreastFeedingRecapitulationCreateForm extends Component
{
    use WithBreastFeedingRecapitulationRules,
        WithBreastFeedingRecapitulationService;

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil membuat rekapitulasi pemberian air susu ibu.')
            );

        return redirect()
            ->route('admin.cluster_3.breast_feeding.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_3.breast_feeding.recapitulation.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
