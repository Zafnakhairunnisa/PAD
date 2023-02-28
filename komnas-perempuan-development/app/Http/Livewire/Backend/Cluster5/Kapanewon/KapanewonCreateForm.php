<?php

namespace App\Http\Livewire\Backend\Cluster5\Kapanewon;

use App\Http\Livewire\Backend\Cluster5\Kapanewon\Traits\WithKapanewonRules;
use App\Http\Livewire\Backend\Cluster5\Kapanewon\Traits\WithKapanewonService;
use Livewire\Component;
use Livewire\WithFileUploads;

class KapanewonCreateForm extends Component
{
    use WithKapanewonRules,
        WithKapanewonService,
        WithFileUploads;

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil membuat Kapanewon.')
            );

        return redirect()
            ->route('admin.cluster_5.kapanewon.index');
    }

    public function render()
    {
        return view('backend.cluster_5.kapanewon.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
