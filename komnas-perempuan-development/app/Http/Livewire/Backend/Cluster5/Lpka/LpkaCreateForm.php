<?php

namespace App\Http\Livewire\Backend\Cluster5\Lpka;

use App\Http\Livewire\Backend\Cluster5\Lpka\Traits\WithLpkaRules;
use App\Http\Livewire\Backend\Cluster5\Lpka\Traits\WithLpkaService;
use Livewire\Component;
use Livewire\WithFileUploads;

class LpkaCreateForm extends Component
{
    use WithLpkaRules,
        WithLpkaService,
        WithFileUploads;

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil membuat Lembaga Pembinaan Khusus Anak Yogyakarta.')
            );

        return redirect()->route('admin.cluster_5.lpka.index');
    }

    public function render()
    {
        return view('backend.cluster_5.lpka.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
