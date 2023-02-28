<?php

namespace App\Http\Livewire\Backend\Cluster5\AnakBerhadapanHukum\Recapitulation;

use App\Domains\Cluster5\Models\AnakBerhadapanHukum\AnakBerhadapanHukumRecapitulation;
use App\Http\Livewire\Backend\Cluster5\AnakBerhadapanHukum\Traits\WithAnakBerhadapanHukumRecapitulationRules;
use App\Http\Livewire\Backend\Cluster5\AnakBerhadapanHukum\Traits\WithAnakBerhadapanHukumRecapitulationService;
use Livewire\Component;

class AnakBerhadapanHukumRecapitulationUpdateForm extends Component
{
    use WithAnakBerhadapanHukumRecapitulationRules,
        WithAnakBerhadapanHukumRecapitulationService;

    public AnakBerhadapanHukumRecapitulation $recapitulation;

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
                __('Berhasil mengubah rekapitulasi anak berhadapan dengan hukum.')
            );

        return redirect()->route('admin.cluster_5.anak_berhadapan_hukum.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_5.anak_berhadapan_hukum.recapitulation.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
