<?php

namespace App\Http\Livewire\Backend\Cluster5\Bprs;

use App\Http\Livewire\Backend\Cluster5\Bprs\Traits\WithBprsRules;
use App\Http\Livewire\Backend\Cluster5\Bprs\Traits\WithBprsService;
use Livewire\Component;
use Livewire\WithFileUploads;

class BprsCreateForm extends Component
{
    use WithBprsRules,
        WithBprsService,
        WithFileUploads;

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil membuat balai perlindungan dan rehabilitasi sosial remaja (BPRSR) DIY.')
            );

        return redirect()
            ->route('admin.cluster_5.bprs.index');
    }

    public function render()
    {
        return view('backend.cluster_5.bprs.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
