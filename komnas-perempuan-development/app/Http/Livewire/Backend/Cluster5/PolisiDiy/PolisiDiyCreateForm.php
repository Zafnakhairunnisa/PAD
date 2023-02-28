<?php

namespace App\Http\Livewire\Backend\Cluster5\PolisiDiy;

use App\Http\Livewire\Backend\Cluster5\PolisiDiy\Traits\WithPolisiDiyRules;
use App\Http\Livewire\Backend\Cluster5\PolisiDiy\Traits\WithPolisiDiyService;
use Livewire\Component;

class PolisiDiyCreateForm extends Component
{
    use WithPolisiDiyRules,
        WithPolisiDiyService;

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil membuat Polisi Daerah DIY.')
            );

        return redirect()
            ->route('admin.cluster_5.polisi_diy.index');
    }

    public function render()
    {
        return view('backend.cluster_5.polisi_diy.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
