<?php

namespace App\Http\Livewire\Backend\Cluster4\PusatKreatifitasAnak;

use App\Http\Livewire\Backend\Cluster4\PusatKreatifitasAnak\Traits\WithPusatKreatifitasAnakRules;
use App\Http\Livewire\Backend\Cluster4\PusatKreatifitasAnak\Traits\WithPusatKreatifitasAnakService;
use Livewire\Component;

class PusatKreatifitasAnakCreateForm extends Component
{
    use WithPusatKreatifitasAnakRules,
        WithPusatKreatifitasAnakService;

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil membuat pusat kreatifitas anak.')
            );

        return redirect()
            ->route('admin.cluster_4.pusat_kreatifitas_anak.index');
    }

    public function render()
    {
        return view('backend.cluster_4.pusat_kreatifitas_anak.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
