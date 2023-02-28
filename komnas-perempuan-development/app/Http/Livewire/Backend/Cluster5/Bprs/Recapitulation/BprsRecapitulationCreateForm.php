<?php

namespace App\Http\Livewire\Backend\Cluster5\Bprs\Recapitulation;

use App\Http\Livewire\Backend\Cluster5\Bprs\Traits\WithBprsRecapitulationRules;
use App\Http\Livewire\Backend\Cluster5\Bprs\Traits\WithBprsRecapitulationService;
use Livewire\Component;

class BprsRecapitulationCreateForm extends Component
{
    use WithBprsRecapitulationRules,
        WithBprsRecapitulationService;

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil membuat rekapitulasi balai perlindungan dan rehabilitasi sosial remaja (BPRSR) DIY.')
            );

        return redirect()
            ->route('admin.cluster_5.bprs.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_5.bprs.recapitulation.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
