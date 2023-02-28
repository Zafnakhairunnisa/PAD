<?php

namespace App\Http\Livewire\Backend\Cluster5\AnakKorbanTerorisme\Recapitulation;

use App\Http\Livewire\Backend\Cluster5\AnakKorbanTerorisme\Traits\WithAnakKorbanTerorismeRecapitulationRules;
use App\Http\Livewire\Backend\Cluster5\AnakKorbanTerorisme\Traits\WithAnakKorbanTerorismeRecapitulationService;
use Livewire\Component;

class AnakKorbanTerorismeRecapitulationCreateForm extends Component
{
    use WithAnakKorbanTerorismeRecapitulationRules,
        WithAnakKorbanTerorismeRecapitulationService;

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil membuat rekapitulasi anak korban terorisme dan radikalisme.')
            );

        return redirect()
            ->route('admin.cluster_5.anak_korban_terorisme.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_5.anak_korban_terorisme.recapitulation.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
