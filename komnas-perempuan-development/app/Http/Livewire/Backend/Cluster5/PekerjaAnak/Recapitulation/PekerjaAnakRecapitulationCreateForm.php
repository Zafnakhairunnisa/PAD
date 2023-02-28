<?php

namespace App\Http\Livewire\Backend\Cluster5\PekerjaAnak\Recapitulation;

use App\Http\Livewire\Backend\Cluster5\PekerjaAnak\Traits\WithPekerjaAnakRecapitulationRules;
use App\Http\Livewire\Backend\Cluster5\PekerjaAnak\Traits\WithPekerjaAnakRecapitulationService;
use Livewire\Component;

class PekerjaAnakRecapitulationCreateForm extends Component
{
    use WithPekerjaAnakRecapitulationRules,
        WithPekerjaAnakRecapitulationService;

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil membuat rekapitulasi pekerja anak.')
            );

        return redirect()
            ->route('admin.cluster_5.pekerja_anak.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_5.pekerja_anak.recapitulation.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
