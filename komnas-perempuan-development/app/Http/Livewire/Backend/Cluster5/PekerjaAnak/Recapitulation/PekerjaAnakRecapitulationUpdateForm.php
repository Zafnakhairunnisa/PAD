<?php

namespace App\Http\Livewire\Backend\Cluster5\PekerjaAnak\Recapitulation;

use App\Domains\Cluster5\Models\PekerjaAnak\PekerjaAnakRecapitulation;
use App\Http\Livewire\Backend\Cluster5\PekerjaAnak\Traits\WithPekerjaAnakRecapitulationRules;
use App\Http\Livewire\Backend\Cluster5\PekerjaAnak\Traits\WithPekerjaAnakRecapitulationService;
use Livewire\Component;

class PekerjaAnakRecapitulationUpdateForm extends Component
{
    use WithPekerjaAnakRecapitulationRules,
        WithPekerjaAnakRecapitulationService;

    public PekerjaAnakRecapitulation $recapitulation;

    public function mount()
    {
        $this->value = $this->recapitulation->value;
        $this->year = $this->recapitulation->year;
        $this->gender = $this->recapitulation->gender;
        $this->location_id = $this->recapitulation->location_id;
    }

    public function submit()
    {
        $validated = $this->validate();
        $this->service->update($this->recapitulation, $validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil mengubah rekapitulasi pekerja anak.')
            );

        return redirect()->route('admin.cluster_5.pekerja_anak.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_5.pekerja_anak.recapitulation.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
