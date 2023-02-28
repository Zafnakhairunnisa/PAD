<?php

namespace App\Http\Livewire\Backend\Cluster5\PolisiDiy\Recapitulation;

use App\Http\Livewire\Backend\Cluster5\PolisiDiy\Traits\WithPolisiDiyRecapitulationRules;
use App\Http\Livewire\Backend\Cluster5\PolisiDiy\Traits\WithPolisiDiyRecapitulationService;
use Livewire\Component;

class PolisiDiyRecapitulationCreateForm extends Component
{
    use WithPolisiDiyRecapitulationRules,
        WithPolisiDiyRecapitulationService;

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil membuat rekapitulasi Polisi Daerah DIY.')
            );

        return redirect()
            ->route('admin.cluster_5.polisi_diy.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_5.polisi_diy.recapitulation.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
