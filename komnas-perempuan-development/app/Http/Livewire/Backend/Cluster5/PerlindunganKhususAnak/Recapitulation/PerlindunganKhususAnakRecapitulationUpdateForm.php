<?php

namespace App\Http\Livewire\Backend\Cluster5\PerlindunganKhususAnak\Recapitulation;

use App\Domains\Cluster5\Models\PerlindunganKhususAnak\PerlindunganKhususAnakRecapitulation;
use App\Http\Livewire\Backend\Cluster5\PerlindunganKhususAnak\Traits\WithPerlindunganKhususAnakRecapitulationRules;
use App\Http\Livewire\Backend\Cluster5\PerlindunganKhususAnak\Traits\WithPerlindunganKhususAnakRecapitulationService;
use Livewire\Component;

class PerlindunganKhususAnakRecapitulationUpdateForm extends Component
{
    use WithPerlindunganKhususAnakRecapitulationRules,
        WithPerlindunganKhususAnakRecapitulationService;

    public PerlindunganKhususAnakRecapitulation $recapitulation;

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
                __('Berhasil mengubah rekapitulasi perlindungan khusus anak.')
            );

        return redirect()->route('admin.cluster_5.perlindungan_khusus_anak.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_5.perlindungan_khusus_anak.recapitulation.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
