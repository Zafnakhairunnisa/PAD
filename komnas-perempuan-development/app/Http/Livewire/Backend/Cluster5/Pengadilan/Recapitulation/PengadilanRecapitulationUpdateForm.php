<?php

namespace App\Http\Livewire\Backend\Cluster5\Pengadilan\Recapitulation;

use App\Domains\Cluster5\Models\Pengadilan\PengadilanRecapitulation;
use App\Http\Livewire\Backend\Cluster5\Pengadilan\Traits\WithPengadilanRecapitulationRules;
use App\Http\Livewire\Backend\Cluster5\Pengadilan\Traits\WithPengadilanRecapitulationService;
use Livewire\Component;

class PengadilanRecapitulationUpdateForm extends Component
{
    use WithPengadilanRecapitulationRules,
        WithPengadilanRecapitulationService;

    public PengadilanRecapitulation $recapitulation;

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
                __('Berhasil mengubah rekapitulasi Pengadilan Daerah DIY.')
            );

        return redirect()->route('admin.cluster_5.pengadilan.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_5.pengadilan.recapitulation.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
