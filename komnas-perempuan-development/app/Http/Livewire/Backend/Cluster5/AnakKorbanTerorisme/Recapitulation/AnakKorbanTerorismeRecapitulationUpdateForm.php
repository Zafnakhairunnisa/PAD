<?php

namespace App\Http\Livewire\Backend\Cluster5\AnakKorbanTerorisme\Recapitulation;

use App\Domains\Cluster5\Models\AnakKorbanTerorisme\AnakKorbanTerorismeRecapitulation;
use App\Http\Livewire\Backend\Cluster5\AnakKorbanTerorisme\Traits\WithAnakKorbanTerorismeRecapitulationRules;
use App\Http\Livewire\Backend\Cluster5\AnakKorbanTerorisme\Traits\WithAnakKorbanTerorismeRecapitulationService;
use Livewire\Component;

class AnakKorbanTerorismeRecapitulationUpdateForm extends Component
{
    use WithAnakKorbanTerorismeRecapitulationRules,
        WithAnakKorbanTerorismeRecapitulationService;

    public AnakKorbanTerorismeRecapitulation $recapitulation;

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
                __('Berhasil mengubah rekapitulasi anak korban terorisme dan radikalisme.')
            );

        return redirect()->route('admin.cluster_5.anak_korban_terorisme.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_5.anak_korban_terorisme.recapitulation.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
