<?php

namespace App\Http\Livewire\Backend\Cluster5\AnakAids\Recapitulation;

use App\Http\Livewire\Backend\Cluster5\AnakAids\Traits\WithAnakAidsRecapitulationRules;
use App\Http\Livewire\Backend\Cluster5\AnakAids\Traits\WithAnakAidsRecapitulationService;
use Livewire\Component;

class AnakAidsRecapitulationCreateForm extends Component
{
    use WithAnakAidsRecapitulationRules,
        WithAnakAidsRecapitulationService;

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil membuat rekapitulasi anak aids.')
            );

        return redirect()
            ->route('admin.cluster_5.anak_aids.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_5.anak_aids.recapitulation.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
