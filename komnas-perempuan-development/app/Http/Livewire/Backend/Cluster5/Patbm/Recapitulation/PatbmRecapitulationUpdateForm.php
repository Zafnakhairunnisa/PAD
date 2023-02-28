<?php

namespace App\Http\Livewire\Backend\Cluster5\Patbm\Recapitulation;

use App\Domains\Cluster5\Models\Patbm\PatbmRecapitulation;
use App\Http\Livewire\Backend\Cluster5\Patbm\Traits\WithPatbmRecapitulationRules;
use App\Http\Livewire\Backend\Cluster5\Patbm\Traits\WithPatbmRecapitulationService;
use Livewire\Component;

class PatbmRecapitulationUpdateForm extends Component
{
    use WithPatbmRecapitulationRules,
        WithPatbmRecapitulationService;

    public PatbmRecapitulation $recapitulation;

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
                __('Berhasil mengubah rekapitulasi Lembaga Pembinaan Khusus Anak Yogyakarta.')
            );

        return redirect()->route('admin.cluster_5.patbm.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_5.patbm.recapitulation.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
