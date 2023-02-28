<?php

namespace App\Http\Livewire\Backend\Cluster5\Kejaksaan;

use App\Http\Livewire\Backend\Cluster5\Kejaksaan\Traits\WithKejaksaanRules;
use App\Http\Livewire\Backend\Cluster5\Kejaksaan\Traits\WithKejaksaanService;
use Livewire\Component;

class KejaksaanCreateForm extends Component
{
    use WithKejaksaanRules,
        WithKejaksaanService;

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil membuat Kejaksaan Daerah DIY.')
            );

        return redirect()
            ->route('admin.cluster_5.kejaksaan.index');
    }

    public function render()
    {
        return view('backend.cluster_5.kejaksaan.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
