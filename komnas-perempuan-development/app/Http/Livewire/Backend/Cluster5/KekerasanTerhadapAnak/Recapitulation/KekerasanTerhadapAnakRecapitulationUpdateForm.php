<?php

namespace App\Http\Livewire\Backend\Cluster5\KekerasanTerhadapAnak\Recapitulation;

use App\Domains\Cluster5\Models\KekerasanTerhadapAnak\KekerasanTerhadapAnakRecapitulation;
use App\Http\Livewire\Backend\Cluster5\KekerasanTerhadapAnak\Traits\WithKekerasanTerhadapAnakRecapitulationRules;
use App\Http\Livewire\Backend\Cluster5\KekerasanTerhadapAnak\Traits\WithKekerasanTerhadapAnakRecapitulationService;
use Livewire\Component;

class KekerasanTerhadapAnakRecapitulationUpdateForm extends Component
{
    use WithKekerasanTerhadapAnakRecapitulationRules,
        WithKekerasanTerhadapAnakRecapitulationService;

    public KekerasanTerhadapAnakRecapitulation $recapitulation;

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
                __('Berhasil mengubah rekapitulasi kekerasan terhadap anak.')
            );

        return redirect()->route('admin.cluster_5.kekerasan_terhadap_anak.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_5.kekerasan_terhadap_anak.recapitulation.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
