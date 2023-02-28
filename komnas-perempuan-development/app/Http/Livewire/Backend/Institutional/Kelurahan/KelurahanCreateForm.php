<?php

namespace App\Http\Livewire\Backend\Institutional\Kelurahan;

use App\Http\Livewire\Backend\Institutional\Kelurahan\Traits\WithKelurahanRules;
use App\Http\Livewire\Backend\Institutional\Kelurahan\Traits\WithKelurahanService;
use Livewire\Component;
use Livewire\WithFileUploads;

class KelurahanCreateForm extends Component
{
    use WithKelurahanRules,
        WithKelurahanService,
        WithFileUploads;

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil membuat Kelurahan.')
            );

        return redirect()
            ->route('admin.institutional.kelurahan.index');
    }

    public function render()
    {
        return view('backend.institutional.kelurahan.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
