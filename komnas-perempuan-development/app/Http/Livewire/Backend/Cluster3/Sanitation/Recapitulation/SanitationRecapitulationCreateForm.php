<?php

namespace App\Http\Livewire\Backend\Cluster3\Sanitation\Recapitulation;

use App\Http\Livewire\Backend\Cluster3\Sanitation\Traits\WithSanitationRecapitulationRules;
use App\Http\Livewire\Backend\Cluster3\Sanitation\Traits\WithSanitationRecapitulationService;
use Livewire\Component;

class SanitationRecapitulationCreateForm extends Component
{
    use WithSanitationRecapitulationRules,
        WithSanitationRecapitulationService;

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil membuat rekapitulasi air bersih dan sanitasi.')
            );

        return redirect()
            ->route('admin.cluster_3.sanitation.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_3.sanitation.recapitulation.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
