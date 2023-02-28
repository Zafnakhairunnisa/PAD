<?php

namespace App\Http\Livewire\Backend\Cluster5\Peksos\Recapitulation;

use App\Http\Livewire\Backend\Cluster5\Peksos\Traits\WithPeksosRecapitulationRules;
use App\Http\Livewire\Backend\Cluster5\Peksos\Traits\WithPeksosRecapitulationService;
use Livewire\Component;

class PeksosRecapitulationCreateForm extends Component
{
    use WithPeksosRecapitulationRules,
        WithPeksosRecapitulationService;

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil membuat rekapitulasi Pekerja Sosial.')
            );

        return redirect()
            ->route('admin.cluster_5.peksos.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_5.peksos.recapitulation.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
