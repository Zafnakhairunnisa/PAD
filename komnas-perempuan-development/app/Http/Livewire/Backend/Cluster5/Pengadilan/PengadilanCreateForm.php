<?php

namespace App\Http\Livewire\Backend\Cluster5\Pengadilan;

use App\Http\Livewire\Backend\Cluster5\Pengadilan\Traits\WithPengadilanRules;
use App\Http\Livewire\Backend\Cluster5\Pengadilan\Traits\WithPengadilanService;
use Livewire\Component;

class PengadilanCreateForm extends Component
{
    use WithPengadilanRules,
        WithPengadilanService;

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil membuat Pengadilan DIY.')
            );

        return redirect()
            ->route('admin.cluster_5.pengadilan.index');
    }

    public function render()
    {
        return view('backend.cluster_5.pengadilan.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
