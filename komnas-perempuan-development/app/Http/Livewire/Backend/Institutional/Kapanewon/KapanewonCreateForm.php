<?php

namespace App\Http\Livewire\Backend\Institutional\Kapanewon;

use App\Http\Livewire\Backend\Institutional\Kapanewon\Traits\WithKapanewonRules;
use App\Http\Livewire\Backend\Institutional\Kapanewon\Traits\WithKapanewonService;
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
            ->route('admin.institutional.kapanewon.index');
    }

    public function render()
    {
        return view('backend.institutional.kapanewon.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
