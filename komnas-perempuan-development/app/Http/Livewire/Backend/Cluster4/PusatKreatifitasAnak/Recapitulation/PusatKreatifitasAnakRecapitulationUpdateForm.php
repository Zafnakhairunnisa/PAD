<?php

namespace App\Http\Livewire\Backend\Cluster4\PusatKreatifitasAnak\Recapitulation;

use App\Domains\Cluster4\Models\PusatKreatifitasAnak\PusatKreatifitasAnakRecapitulation;
use App\Http\Livewire\Backend\Cluster4\PusatKreatifitasAnak\Traits\WithPusatKreatifitasAnakRecapitulationRules;
use App\Http\Livewire\Backend\Cluster4\PusatKreatifitasAnak\Traits\WithPusatKreatifitasAnakRecapitulationService;
use Livewire\Component;

class PusatKreatifitasAnakRecapitulationUpdateForm extends Component
{
    use WithPusatKreatifitasAnakRecapitulationRules,
        WithPusatKreatifitasAnakRecapitulationService;

    public PusatKreatifitasAnakRecapitulation $recapitulation;

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
                __('Berhasil mengubah rekapitulasi pusat kreatifitas anak.')
            );

        return redirect()->route('admin.cluster_4.pusat_kreatifitas_anak.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_4.pusat_kreatifitas_anak.recapitulation.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
