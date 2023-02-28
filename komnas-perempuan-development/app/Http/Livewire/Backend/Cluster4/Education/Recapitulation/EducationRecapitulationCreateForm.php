<?php

namespace App\Http\Livewire\Backend\Cluster4\Education\Recapitulation;

use App\Http\Livewire\Backend\Cluster4\Education\Traits\WithEducationRecapitulationRules;
use App\Http\Livewire\Backend\Cluster4\Education\Traits\WithEducationRecapitulationService;
use Livewire\Component;

class EducationRecapitulationCreateForm extends Component
{
    use WithEducationRecapitulationRules,
        WithEducationRecapitulationService;

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil membuat rekapitulasi pendidikan.')
            );

        return redirect()
            ->route('admin.cluster_4.education.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_4.education.recapitulation.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
