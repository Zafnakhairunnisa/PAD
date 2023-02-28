<?php

namespace App\Http\Livewire\Backend\Cluster5\Kapanewon\Recapitulation;

use App\Domains\Cluster5\Models\Kapanewon\KapanewonRecapitulation;
use App\Http\Livewire\Backend\Cluster5\Kapanewon\Traits\WithKapanewonRecapitulationRules;
use App\Http\Livewire\Backend\Cluster5\Kapanewon\Traits\WithKapanewonRecapitulationService;
use Livewire\Component;

class KapanewonRecapitulationUpdateForm extends Component
{
    use WithKapanewonRecapitulationRules,
        WithKapanewonRecapitulationService;

    public KapanewonRecapitulation $recapitulation;

    public function mount()
    {
        $this->value = $this->recapitulation->value;
        $this->year = $this->recapitulation->year;
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
                __('Berhasil mengubah rekapitulasi Kapanewon.')
            );

        return redirect()->route('admin.cluster_5.kapanewon.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_5.kapanewon.recapitulation.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
