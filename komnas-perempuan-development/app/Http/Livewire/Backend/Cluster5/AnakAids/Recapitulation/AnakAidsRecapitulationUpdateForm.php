<?php

namespace App\Http\Livewire\Backend\Cluster5\AnakAids\Recapitulation;

use App\Domains\Cluster5\Models\AnakAids\AnakAidsRecapitulation;
use App\Http\Livewire\Backend\Cluster5\AnakAids\Traits\WithAnakAidsRecapitulationRules;
use App\Http\Livewire\Backend\Cluster5\AnakAids\Traits\WithAnakAidsRecapitulationService;
use Livewire\Component;

class AnakAidsRecapitulationUpdateForm extends Component
{
    use WithAnakAidsRecapitulationRules,
        WithAnakAidsRecapitulationService;

    public AnakAidsRecapitulation $recapitulation;

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
                __('Berhasil mengubah rekapitulasi anak aids.')
            );

        return redirect()->route('admin.cluster_5.anak_aids.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_5.anak_aids.recapitulation.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
