<?php

namespace App\Http\Livewire\Backend\Cluster5\PolisiDiy\Recapitulation;

use App\Domains\Cluster5\Models\PolisiDiy\PolisiDiyRecapitulation;
use App\Http\Livewire\Backend\Cluster5\PolisiDiy\Traits\WithPolisiDiyRecapitulationRules;
use App\Http\Livewire\Backend\Cluster5\PolisiDiy\Traits\WithPolisiDiyRecapitulationService;
use Livewire\Component;

class PolisiDiyRecapitulationUpdateForm extends Component
{
    use WithPolisiDiyRecapitulationRules,
        WithPolisiDiyRecapitulationService;

    public PolisiDiyRecapitulation $recapitulation;

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
                __('Berhasil mengubah rekapitulasi Polisi Daerah DIY.')
            );

        return redirect()->route('admin.cluster_5.polisi_diy.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_5.polisi_diy.recapitulation.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
