<?php

namespace App\Http\Livewire\Backend\Cluster5\Peksos;

use App\Http\Livewire\Backend\Cluster5\Peksos\Traits\WithPeksosRules;
use App\Http\Livewire\Backend\Cluster5\Peksos\Traits\WithPeksosService;
use Livewire\Component;

class PeksosCreateForm extends Component
{
    use WithPeksosRules,
        WithPeksosService;

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil membuat Pekerja Sosial.')
            );

        return redirect()
            ->route('admin.cluster_5.peksos.index');
    }

    public function render()
    {
        return view('backend.cluster_5.peksos.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
