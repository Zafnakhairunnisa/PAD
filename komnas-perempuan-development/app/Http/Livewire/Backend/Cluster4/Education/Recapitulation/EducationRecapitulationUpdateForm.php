<?php

namespace App\Http\Livewire\Backend\Cluster4\Education\Recapitulation;

use App\Domains\Cluster4\Models\Education\EducationRecapitulation;
use App\Http\Livewire\Backend\Cluster4\Education\Traits\WithEducationRecapitulationRules;
use App\Http\Livewire\Backend\Cluster4\Education\Traits\WithEducationRecapitulationService;
use Livewire\Component;

class EducationRecapitulationUpdateForm extends Component
{
    use WithEducationRecapitulationRules,
        WithEducationRecapitulationService;

    public EducationRecapitulation $recapitulation;

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
                __('Berhasil mengubah rekapitulasi pendidikan.')
            );

        return redirect()->route('admin.cluster_4.education.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_4.education.recapitulation.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
