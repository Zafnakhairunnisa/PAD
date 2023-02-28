<?php

namespace App\Http\Livewire\Backend\Institutional\Kelurahan;

use App\Domains\Institutional\Models\Kelurahan\Kelurahan;
use App\Http\Livewire\Backend\Institutional\Kelurahan\Traits\WithKelurahanRules;
use App\Http\Livewire\Backend\Institutional\Kelurahan\Traits\WithKelurahanService;
use Livewire\Component;
use Livewire\WithFileUploads;

class KelurahanUpdateForm extends Component
{
    use WithKelurahanRules,
        WithKelurahanService,
        WithFileUploads;

    public $existingImages = [];

    public $existingDocuments = [];

    public Kelurahan $kelurahan;

    public function mount()
    {
        $this->kalurahan_kelurahan = $this->kelurahan->kalurahan_kelurahan;
        $this->kapanewon = $this->kelurahan->kapanewon;
        $this->kabupaten = $this->kelurahan->kabupaten;
        $this->tahun = $this->kelurahan->tahun;
        $this->ketua_gugus = $this->kelurahan->ketua_gugus;
        $this->no_gugus = $this->kelurahan->no_gugus;
        $this->profil_anak = $this->kelurahan->profil_anak;
        $this->forum_anak = $this->kelurahan->forum_anak;
        $this->ruang_bermain = $this->kelurahan->ruang_bermain;
        $this->pusat_informasi = $this->kelurahan->pusat_informasi;
        $this->pusat_kreatifitas = $this->kelurahan->pusat_kreatifitas;
        $this->satgas_ppa = $this->kelurahan->satgas_ppa;
        $this->patbm = $this->kelurahan->patbm;
        $this->pikr = $this->kelurahan->pikr;
        $this->kawasan_tanpa_rokok = $this->kelurahan->kawasan_tanpa_rokok;

        $this->existingImages = $this->kelurahan->images->map(function ($image) {
            return mapFilepondImages($image);
        });
        $this->existingDocuments = $this->kelurahan->documents->map(function ($document) {
            return mapFilepondDocument($document);
        });
    }

    public function submit()
    {
        $validated = $this->validate();
        $this->service->update($this->kelurahan, $validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil mengubah Kelurahan.')
            );

        return redirect()->route('admin.institutional.kelurahan.index');
    }

    public function render()
    {
        return view('backend.institutional.kelurahan.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
