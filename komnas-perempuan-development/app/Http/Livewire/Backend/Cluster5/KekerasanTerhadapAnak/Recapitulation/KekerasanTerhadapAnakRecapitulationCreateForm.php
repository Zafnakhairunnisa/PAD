<?php

namespace App\Http\Livewire\Backend\Cluster5\KekerasanTerhadapAnak\Recapitulation;

use App\Http\Livewire\Backend\Cluster5\KekerasanTerhadapAnak\Traits\WithKekerasanTerhadapAnakRecapitulationRules;
use App\Http\Livewire\Backend\Cluster5\KekerasanTerhadapAnak\Traits\WithKekerasanTerhadapAnakRecapitulationService;
use Livewire\Component;

class KekerasanTerhadapAnakRecapitulationCreateForm extends Component
{
    use WithKekerasanTerhadapAnakRecapitulationRules,
        WithKekerasanTerhadapAnakRecapitulationService;

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil membuat rekapitulasi Kekerasan Terhadap Anak.')
            );

        return redirect()
            ->route('admin.cluster_5.kekerasan_terhadap_anak.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_5.kekerasan_terhadap_anak.recapitulation.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
