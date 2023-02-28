<?php

namespace App\Http\Livewire\Backend\Cluster5\Lpka\Recapitulation;

use App\Http\Livewire\Backend\Cluster5\Lpka\Traits\WithLpkaRecapitulationRules;
use App\Http\Livewire\Backend\Cluster5\Lpka\Traits\WithLpkaRecapitulationService;
use Livewire\Component;

class LpkaRecapitulationCreateForm extends Component
{
    use WithLpkaRecapitulationRules,
        WithLpkaRecapitulationService;

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil membuat rekapitulasi Lembaga Pembinaan Khusus Anak Yogyakarta.')
            );

        return redirect()
            ->route('admin.cluster_5.lpka.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_5.lpka.recapitulation.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
