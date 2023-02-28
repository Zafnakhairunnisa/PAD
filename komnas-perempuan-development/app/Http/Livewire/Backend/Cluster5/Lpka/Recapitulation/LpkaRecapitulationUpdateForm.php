<?php

namespace App\Http\Livewire\Backend\Cluster5\Lpka\Recapitulation;

use App\Domains\Cluster5\Models\Lpka\LpkaRecapitulation;
use App\Http\Livewire\Backend\Cluster5\Lpka\Traits\WithLpkaRecapitulationRules;
use App\Http\Livewire\Backend\Cluster5\Lpka\Traits\WithLpkaRecapitulationService;
use Livewire\Component;

class LpkaRecapitulationUpdateForm extends Component
{
    use WithLpkaRecapitulationRules,
        WithLpkaRecapitulationService;

    public LpkaRecapitulation $recapitulation;

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
                __('Berhasil mengubah rekapitulasi Lembaga Pembinaan Khusus Anak Yogyakarta.')
            );

        return redirect()->route('admin.cluster_5.lpka.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_5.lpka.recapitulation.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
