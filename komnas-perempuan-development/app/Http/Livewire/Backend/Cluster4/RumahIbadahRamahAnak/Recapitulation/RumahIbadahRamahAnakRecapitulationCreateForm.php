<?php

namespace App\Http\Livewire\Backend\Cluster4\RumahIbadahRamahAnak\Recapitulation;

use App\Http\Livewire\Backend\Cluster4\RumahIbadahRamahAnak\Traits\WithRumahIbadahRamahAnakRecapitulationRules;
use App\Http\Livewire\Backend\Cluster4\RumahIbadahRamahAnak\Traits\WithRumahIbadahRamahAnakRecapitulationService;
use Livewire\Component;

class RumahIbadahRamahAnakRecapitulationCreateForm extends Component
{
    use WithRumahIbadahRamahAnakRecapitulationRules,
        WithRumahIbadahRamahAnakRecapitulationService;

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil membuat rekapitulasi rumah ibadah ramah anak.')
            );

        return redirect()
            ->route('admin.cluster_4.rumah_ibadah_ramah_anak.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_4.rumah_ibadah_ramah_anak.recapitulation.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
