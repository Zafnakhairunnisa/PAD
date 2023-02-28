<?php

namespace App\Http\Livewire\Backend\Cluster4\PusatKreatifitasAnak;

use App\Domains\Cluster4\Models\PusatKreatifitasAnak\PusatKreatifitasAnak;
use App\Http\Livewire\Backend\Cluster4\PusatKreatifitasAnak\Traits\WithPusatKreatifitasAnakRules;
use App\Http\Livewire\Backend\Cluster4\PusatKreatifitasAnak\Traits\WithPusatKreatifitasAnakService;
use Livewire\Component;

class PusatKreatifitasAnakUpdateForm extends Component
{
    use WithPusatKreatifitasAnakRules,
        WithPusatKreatifitasAnakService;

    public PusatKreatifitasAnak $pusatKreatifitasAnak;

    public function mount()
    {
        $this->nama = $this->pusatKreatifitasAnak->nama;
        $this->bidang = $this->pusatKreatifitasAnak->bidang;
        $this->alamat = $this->pusatKreatifitasAnak->alamat;
        $this->kalurahan = $this->pusatKreatifitasAnak->kalurahan;
        $this->kapanewon = $this->pusatKreatifitasAnak->kapanewon;
        $this->location_id = $this->pusatKreatifitasAnak->location_id;
        $this->legalitas = $this->pusatKreatifitasAnak->legalitas;
        $this->papan_nama = $this->pusatKreatifitasAnak->papan_nama;
        $this->pelatihan_kha = $this->pusatKreatifitasAnak->pelatihan_kha;
        $this->kegiatan = $this->pusatKreatifitasAnak->kegiatan;
        $this->prestasi = $this->pusatKreatifitasAnak->prestasi;
    }

    public function submit()
    {
        $validated = $this->validate();
        $this->service->update($this->pusatKreatifitasAnak, $validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil mengubah pusat kreatifitas anak.')
            );

        return redirect()->route('admin.cluster_4.pusat_kreatifitas_anak.index');
    }

    public function render()
    {
        return view('backend.cluster_4.pusat_kreatifitas_anak.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
