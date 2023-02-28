<?php

namespace App\Http\Livewire\Backend\Cluster5\Bprs\Recapitulation;

use App\Domains\Cluster5\Models\Bprs\BprsRecapitulation;
use App\Http\Livewire\Backend\Cluster5\Bprs\Traits\WithBprsRecapitulationRules;
use App\Http\Livewire\Backend\Cluster5\Bprs\Traits\WithBprsRecapitulationService;
use Livewire\Component;

class BprsRecapitulationUpdateForm extends Component
{
    use WithBprsRecapitulationRules,
        WithBprsRecapitulationService;

    public BprsRecapitulation $recapitulation;

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
                __('Berhasil mengubah rekapitulasi balai perlindungan dan rehabilitasi sosial remaja (BPRSR) DIY.')
            );

        return redirect()->route('admin.cluster_5.bprs.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_5.bprs.recapitulation.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
