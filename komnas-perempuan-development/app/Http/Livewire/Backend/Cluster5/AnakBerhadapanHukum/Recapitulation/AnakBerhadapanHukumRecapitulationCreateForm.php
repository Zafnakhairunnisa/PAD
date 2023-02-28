<?php

namespace App\Http\Livewire\Backend\Cluster5\AnakBerhadapanHukum\Recapitulation;

use App\Http\Livewire\Backend\Cluster5\AnakBerhadapanHukum\Traits\WithAnakBerhadapanHukumRecapitulationRules;
use App\Http\Livewire\Backend\Cluster5\AnakBerhadapanHukum\Traits\WithAnakBerhadapanHukumRecapitulationService;
use Livewire\Component;

class AnakBerhadapanHukumRecapitulationCreateForm extends Component
{
    use WithAnakBerhadapanHukumRecapitulationRules,
        WithAnakBerhadapanHukumRecapitulationService;

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil membuat rekapitulasi anak berhadapan dengan hukum.')
            );

        return redirect()
            ->route('admin.cluster_5.anak_berhadapan_hukum.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_5.anak_berhadapan_hukum.recapitulation.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
