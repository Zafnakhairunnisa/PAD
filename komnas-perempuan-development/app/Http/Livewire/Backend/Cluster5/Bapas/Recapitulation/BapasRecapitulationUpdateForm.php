<?php

namespace App\Http\Livewire\Backend\Cluster5\Bapas\Recapitulation;

use App\Domains\Cluster5\Models\Bapas\BapasRecapitulation;
use App\Http\Livewire\Backend\Cluster5\Bapas\Traits\WithBapasRecapitulationRules;
use App\Http\Livewire\Backend\Cluster5\Bapas\Traits\WithBapasRecapitulationService;
use Livewire\Component;

class BapasRecapitulationUpdateForm extends Component
{
    use WithBapasRecapitulationRules,
        WithBapasRecapitulationService;

    public BapasRecapitulation $recapitulation;

    public function mount()
    {
        $this->value = $this->recapitulation->value;
        $this->year = $this->recapitulation->year;
        $this->gender = $this->recapitulation->gender;
        $this->location_id = $this->recapitulation->location_id;
        $this->category_id = $this->recapitulation->category_id;
    }

    public function submit()
    {
        $validated = $this->validate();
        $this->service->update($this->recapitulation, $validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil mengubah rekapitulasi Balai Pemasyarakatan.')
            );

        return redirect()->route('admin.cluster_5.bapas.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_5.bapas.recapitulation.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
