<?php

namespace App\Http\Livewire\Backend\Cluster5\Kejaksaan\Recapitulation;

use App\Domains\Cluster5\Models\Kejaksaan\KejaksaanRecapitulation;
use App\Http\Livewire\Backend\Cluster5\Kejaksaan\Traits\WithKejaksaanRecapitulationRules;
use App\Http\Livewire\Backend\Cluster5\Kejaksaan\Traits\WithKejaksaanRecapitulationService;
use Livewire\Component;

class KejaksaanRecapitulationUpdateForm extends Component
{
    use WithKejaksaanRecapitulationRules,
        WithKejaksaanRecapitulationService;

    public KejaksaanRecapitulation $recapitulation;

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
                __('Berhasil mengubah rekapitulasi Kejaksaan Daerah DIY.')
            );

        return redirect()->route('admin.cluster_5.kejaksaan.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_5.kejaksaan.recapitulation.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
