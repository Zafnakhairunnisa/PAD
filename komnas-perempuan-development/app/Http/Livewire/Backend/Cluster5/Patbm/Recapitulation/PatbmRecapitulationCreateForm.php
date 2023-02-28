<?php

namespace App\Http\Livewire\Backend\Cluster5\Patbm\Recapitulation;

use App\Http\Livewire\Backend\Cluster5\Patbm\Traits\WithPatbmRecapitulationRules;
use App\Http\Livewire\Backend\Cluster5\Patbm\Traits\WithPatbmRecapitulationService;
use Livewire\Component;

class PatbmRecapitulationCreateForm extends Component
{
    use WithPatbmRecapitulationRules,
        WithPatbmRecapitulationService;

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil membuat rekapitulasi Lembaga Pembinaan Khusus Anak Yogyakarta.')
            );

        return redirect()
            ->route('admin.cluster_5.patbm.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_5.patbm.recapitulation.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
