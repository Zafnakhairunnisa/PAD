<?php

namespace App\Http\Livewire\Backend\Cluster5\Kapanewon\Recapitulation;

use App\Http\Livewire\Backend\Cluster5\Kapanewon\Traits\WithKapanewonRecapitulationRules;
use App\Http\Livewire\Backend\Cluster5\Kapanewon\Traits\WithKapanewonRecapitulationService;
use Livewire\Component;

class KapanewonRecapitulationCreateForm extends Component
{
    use WithKapanewonRecapitulationRules,
        WithKapanewonRecapitulationService;

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil membuat rekapitulasi Kapanewon.')
            );

        return redirect()
            ->route('admin.cluster_5.kapanewon.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_5.kapanewon.recapitulation.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
