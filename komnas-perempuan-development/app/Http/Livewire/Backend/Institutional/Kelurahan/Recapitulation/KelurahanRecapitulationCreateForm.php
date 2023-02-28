<?php

namespace App\Http\Livewire\Backend\Institutional\Kelurahan\Recapitulation;

use App\Http\Livewire\Backend\Institutional\Kelurahan\Traits\WithKelurahanRecapitulationRules;
use App\Http\Livewire\Backend\Institutional\Kelurahan\Traits\WithKelurahanRecapitulationService;
use Livewire\Component;

class KelurahanRecapitulationCreateForm extends Component
{
    use WithKelurahanRecapitulationRules,
        WithKelurahanRecapitulationService;

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil membuat rekapitulasi Kelurahan.')
            );

        return redirect()
            ->route('admin.institutional.kelurahan.recapitulation.index');
    }

    public function render()
    {
        return view('backend.institutional.kelurahan.recapitulation.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
