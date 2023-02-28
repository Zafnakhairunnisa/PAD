<?php

namespace App\Http\Livewire\Backend\Cluster4\PusatKreatifitasAnak\Recapitulation;

use App\Http\Livewire\Backend\Cluster4\PusatKreatifitasAnak\Traits\WithPusatKreatifitasAnakRecapitulationRules;
use App\Http\Livewire\Backend\Cluster4\PusatKreatifitasAnak\Traits\WithPusatKreatifitasAnakRecapitulationService;
use Livewire\Component;

class PusatKreatifitasAnakRecapitulationCreateForm extends Component
{
    use WithPusatKreatifitasAnakRecapitulationRules,
        WithPusatKreatifitasAnakRecapitulationService;

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil membuat rekapitulasi pusat kreatifitas anak.')
            );

        return redirect()
            ->route('admin.cluster_4.pusat_kreatifitas_anak.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_4.pusat_kreatifitas_anak.recapitulation.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
