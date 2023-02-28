<?php

namespace App\Http\Livewire\Backend\Institutional\Kelurahan\Recapitulation;

use App\Domains\Institutional\Models\Kelurahan\KelurahanRecapitulation;
use App\Http\Livewire\Backend\Institutional\Kelurahan\Traits\WithKelurahanRecapitulationRules;
use App\Http\Livewire\Backend\Institutional\Kelurahan\Traits\WithKelurahanRecapitulationService;
use Livewire\Component;

class KelurahanRecapitulationUpdateForm extends Component
{
    use WithKelurahanRecapitulationRules,
        WithKelurahanRecapitulationService;

    public KelurahanRecapitulation $recapitulation;

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
                __('Berhasil mengubah rekapitulasi Kelurahan.')
            );

        return redirect()->route('admin.institutional.kelurahan.recapitulation.index');
    }

    public function render()
    {
        return view('backend.institutional.kelurahan.recapitulation.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
