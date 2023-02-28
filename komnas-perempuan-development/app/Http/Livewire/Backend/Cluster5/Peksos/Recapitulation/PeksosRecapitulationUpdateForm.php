<?php

namespace App\Http\Livewire\Backend\Cluster5\Peksos\Recapitulation;

use App\Domains\Cluster5\Models\Peksos\PeksosRecapitulation;
use App\Http\Livewire\Backend\Cluster5\Peksos\Traits\WithPeksosRecapitulationRules;
use App\Http\Livewire\Backend\Cluster5\Peksos\Traits\WithPeksosRecapitulationService;
use Livewire\Component;

class PeksosRecapitulationUpdateForm extends Component
{
    use WithPeksosRecapitulationRules,
        WithPeksosRecapitulationService;

    public PeksosRecapitulation $recapitulation;

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
                __('Berhasil mengubah rekapitulasi Pekerja Sosial.')
            );

        return redirect()->route('admin.cluster_5.peksos.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_5.peksos.recapitulation.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
