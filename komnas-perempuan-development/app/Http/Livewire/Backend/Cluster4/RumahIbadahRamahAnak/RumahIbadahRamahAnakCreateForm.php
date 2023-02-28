<?php

namespace App\Http\Livewire\Backend\Cluster4\RumahIbadahRamahAnak;

use App\Http\Livewire\Backend\Cluster4\RumahIbadahRamahAnak\Traits\WithRumahIbadahRamahAnakRules;
use App\Http\Livewire\Backend\Cluster4\RumahIbadahRamahAnak\Traits\WithRumahIbadahRamahAnakService;
use Livewire\Component;

class RumahIbadahRamahAnakCreateForm extends Component
{
    use WithRumahIbadahRamahAnakRules,
        WithRumahIbadahRamahAnakService;

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil membuat rumah ibadah ramah anak.')
            );

        return redirect()
            ->route('admin.cluster_4.rumah_ibadah_ramah_anak.index');
    }

    public function render()
    {
        return view('backend.cluster_4.rumah_ibadah_ramah_anak.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
