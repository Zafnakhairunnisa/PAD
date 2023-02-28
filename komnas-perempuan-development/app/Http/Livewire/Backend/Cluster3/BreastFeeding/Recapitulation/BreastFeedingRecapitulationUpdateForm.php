<?php

namespace App\Http\Livewire\Backend\Cluster3\BreastFeeding\Recapitulation;

use App\Domains\Cluster3\Models\BreastFeeding\BreastFeedingRecapitulation;
use App\Http\Livewire\Backend\Cluster3\BreastFeeding\Traits\WithBreastFeedingRecapitulationRules;
use App\Http\Livewire\Backend\Cluster3\BreastFeeding\Traits\WithBreastFeedingRecapitulationService;
use Livewire\Component;

class BreastFeedingRecapitulationUpdateForm extends Component
{
    use WithBreastFeedingRecapitulationRules,
        WithBreastFeedingRecapitulationService;

    public BreastFeedingRecapitulation $recapitulation;

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
                __('Berhasil mengubah rekapitulasi pemberian air susu ibu.')
            );

        return redirect()->route('admin.cluster_3.breast_feeding.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_3.breast_feeding.recapitulation.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
