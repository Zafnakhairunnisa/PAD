<?php

namespace App\Http\Livewire\Backend\Cluster4\RumahIbadahRamahAnak\Recapitulation;

use App\Domains\Cluster4\Models\RumahIbadahRamahAnak\RumahIbadahRamahAnakRecapitulation;
use App\Http\Livewire\Backend\Cluster4\RumahIbadahRamahAnak\Traits\WithRumahIbadahRamahAnakRecapitulationRules;
use App\Http\Livewire\Backend\Cluster4\RumahIbadahRamahAnak\Traits\WithRumahIbadahRamahAnakRecapitulationService;
use Livewire\Component;

class RumahIbadahRamahAnakRecapitulationUpdateForm extends Component
{
    use WithRumahIbadahRamahAnakRecapitulationRules,
        WithRumahIbadahRamahAnakRecapitulationService;

    public RumahIbadahRamahAnakRecapitulation $recapitulation;

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
                __('Berhasil mengubah rekapitulasi rumah ibadah ramah anak.')
            );

        return redirect()->route('admin.cluster_4.rumah_ibadah_ramah_anak.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_4.rumah_ibadah_ramah_anak.recapitulation.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
