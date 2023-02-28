<?php

namespace App\Http\Livewire\Backend\Cluster5\Kejaksaan\Recapitulation;

use App\Http\Livewire\Backend\Cluster5\Kejaksaan\Traits\WithKejaksaanRecapitulationRules;
use App\Http\Livewire\Backend\Cluster5\Kejaksaan\Traits\WithKejaksaanRecapitulationService;
use Livewire\Component;

class KejaksaanRecapitulationCreateForm extends Component
{
    use WithKejaksaanRecapitulationRules,
        WithKejaksaanRecapitulationService;

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil membuat rekapitulasi Kejaksaan Daerah DIY.')
            );

        return redirect()
            ->route('admin.cluster_5.kejaksaan.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_5.kejaksaan.recapitulation.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
