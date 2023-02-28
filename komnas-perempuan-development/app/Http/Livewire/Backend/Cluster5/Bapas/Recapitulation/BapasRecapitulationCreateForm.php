<?php

namespace App\Http\Livewire\Backend\Cluster5\Bapas\Recapitulation;

use App\Http\Livewire\Backend\Cluster5\Bapas\Traits\WithBapasRecapitulationRules;
use App\Http\Livewire\Backend\Cluster5\Bapas\Traits\WithBapasRecapitulationService;
use Livewire\Component;

class BapasRecapitulationCreateForm extends Component
{
    use WithBapasRecapitulationRules,
        WithBapasRecapitulationService;

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil membuat rekapitulasi Balai Pemasyarakatan.')
            );

        return redirect()
            ->route('admin.cluster_5.bapas.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_5.bapas.recapitulation.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
