<?php

namespace App\Http\Livewire\Backend\Cluster5\Bapas;

use App\Http\Livewire\Backend\Cluster5\Bapas\Traits\WithBapasRules;
use App\Http\Livewire\Backend\Cluster5\Bapas\Traits\WithBapasService;
use Livewire\Component;

class BapasCreateForm extends Component
{
    use WithBapasRules,
        WithBapasService;

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil membuat Balai Pemasyarakatan.')
            );

        return redirect()
            ->route('admin.cluster_5.bapas.index');
    }

    public function render()
    {
        return view('backend.cluster_5.bapas.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
