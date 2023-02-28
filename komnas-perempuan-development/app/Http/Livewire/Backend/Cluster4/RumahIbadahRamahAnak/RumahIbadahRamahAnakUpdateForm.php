<?php

namespace App\Http\Livewire\Backend\Cluster4\RumahIbadahRamahAnak;

use App\Domains\Cluster4\Models\RumahIbadahRamahAnak\RumahIbadahRamahAnak;
use App\Http\Livewire\Backend\Cluster4\RumahIbadahRamahAnak\Traits\WithRumahIbadahRamahAnakRules;
use App\Http\Livewire\Backend\Cluster4\RumahIbadahRamahAnak\Traits\WithRumahIbadahRamahAnakService;
use Livewire\Component;

class RumahIbadahRamahAnakUpdateForm extends Component
{
    use WithRumahIbadahRamahAnakRules,
        WithRumahIbadahRamahAnakService;

    public RumahIbadahRamahAnak $rumahIbadahRamahAnak;

    public function mount()
    {
        $this->nama = $this->rumahIbadahRamahAnak->nama;
        $this->jenis = $this->rumahIbadahRamahAnak->jenis;
        $this->alamat = $this->rumahIbadahRamahAnak->alamat;
        $this->kalurahan = $this->rumahIbadahRamahAnak->kalurahan;
        $this->kapanewon = $this->rumahIbadahRamahAnak->kapanewon;
        $this->location_id = $this->rumahIbadahRamahAnak->location_id;
        $this->ruang_bermain = $this->rumahIbadahRamahAnak->ruang_bermain;
        $this->pojok_bacaan = $this->rumahIbadahRamahAnak->pojok_bacaan;
        $this->kawasan_tanpa_rokok = $this->rumahIbadahRamahAnak->kawasan_tanpa_rokok;
        $this->layanan_ramah_anak = $this->rumahIbadahRamahAnak->layanan_ramah_anak;
        $this->kegiatan_kreatif = $this->rumahIbadahRamahAnak->kegiatan_kreatif;
    }

    public function submit()
    {
        $validated = $this->validate();
        $this->service->update($this->rumahIbadahRamahAnak, $validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil mengubah rumah ibadah ramah anak.')
            );

        return redirect()->route('admin.cluster_4.rumah_ibadah_ramah_anak.index');
    }

    public function render()
    {
        return view('backend.cluster_4.rumah_ibadah_ramah_anak.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
