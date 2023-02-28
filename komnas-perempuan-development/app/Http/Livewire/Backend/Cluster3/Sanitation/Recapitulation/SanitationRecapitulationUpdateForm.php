<?php

namespace App\Http\Livewire\Backend\Cluster3\Sanitation\Recapitulation;

use App\Domains\Cluster3\Models\Sanitation\SanitationRecapitulation;
use App\Http\Livewire\Backend\Cluster3\Sanitation\Traits\WithSanitationRecapitulationRules;
use App\Http\Livewire\Backend\Cluster3\Sanitation\Traits\WithSanitationRecapitulationService;
use Livewire\Component;

class SanitationRecapitulationUpdateForm extends Component
{
    use WithSanitationRecapitulationRules,
        WithSanitationRecapitulationService;

    public SanitationRecapitulation $recapitulation;

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
                __('Berhasil mengubah rekapitulasi air bersih dan sanitasi.')
            );

        return redirect()->route('admin.cluster_3.sanitation.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_3.sanitation.recapitulation.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
