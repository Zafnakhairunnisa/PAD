<?php

namespace App\Http\Livewire\Backend\Cluster5\Patbm;

use App\Http\Livewire\Backend\Cluster5\Patbm\Traits\WithPatbmRules;
use App\Http\Livewire\Backend\Cluster5\Patbm\Traits\WithPatbmService;
use Livewire\Component;
use Livewire\WithFileUploads;

class PatbmCreateForm extends Component
{
    use WithPatbmRules,
        WithPatbmService,
        WithFileUploads;

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil membuat Perlindungan Anak Terpadu Berbasis Masyarakat (PATBM).')
            );

        return redirect()->route('admin.cluster_5.patbm.index');
    }

    public function render()
    {
        return view('backend.cluster_5.patbm.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
