<?php

namespace App\Http\Livewire\Backend\Cluster5\Pengadilan\Recapitulation;

use App\Http\Livewire\Backend\Cluster5\Pengadilan\Traits\WithPengadilanRecapitulationRules;
use App\Http\Livewire\Backend\Cluster5\Pengadilan\Traits\WithPengadilanRecapitulationService;
use Livewire\Component;

class PengadilanRecapitulationCreateForm extends Component
{
    use WithPengadilanRecapitulationRules,
        WithPengadilanRecapitulationService;

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil membuat rekapitulasi Pengadilan DIY.')
            );

        return redirect()
            ->route('admin.cluster_5.pengadilan.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_5.pengadilan.recapitulation.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
