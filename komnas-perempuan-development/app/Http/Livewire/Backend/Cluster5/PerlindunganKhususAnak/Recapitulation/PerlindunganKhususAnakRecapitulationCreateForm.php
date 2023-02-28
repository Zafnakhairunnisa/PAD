<?php

namespace App\Http\Livewire\Backend\Cluster5\PerlindunganKhususAnak\Recapitulation;

use App\Http\Livewire\Backend\Cluster5\PerlindunganKhususAnak\Traits\WithPerlindunganKhususAnakRecapitulationRules;
use App\Http\Livewire\Backend\Cluster5\PerlindunganKhususAnak\Traits\WithPerlindunganKhususAnakRecapitulationService;
use Livewire\Component;

class PerlindunganKhususAnakRecapitulationCreateForm extends Component
{
    use WithPerlindunganKhususAnakRecapitulationRules,
        WithPerlindunganKhususAnakRecapitulationService;

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil membuat rekapitulasi perlindungan khusus anak.')
            );

        return redirect()
            ->route('admin.cluster_5.perlindungan_khusus_anak.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_5.perlindungan_khusus_anak.recapitulation.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
