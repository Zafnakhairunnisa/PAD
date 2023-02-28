<?php

namespace App\Http\Livewire\Backend\Institutional\Kapanewon\Recapitulation;

use App\Domains\Institutional\Models\Kapanewon\KapanewonRecapitulation;
use App\Http\Livewire\Backend\Institutional\Kapanewon\Traits\WithKapanewonRecapitulationRules;
use App\Http\Livewire\Backend\Institutional\Kapanewon\Traits\WithKapanewonRecapitulationService;
use Livewire\Component;

class KapanewonRecapitulationUpdateForm extends Component
{
    use WithKapanewonRecapitulationRules,
        WithKapanewonRecapitulationService;

    public KapanewonRecapitulation $recapitulation;

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
                __('Berhasil mengubah rekapitulasi Kapanewon.')
            );

        return redirect()->route('admin.institutional.kapanewon.recapitulation.index');
    }

    public function render()
    {
        return view('backend.institutional.kapanewon.recapitulation.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
