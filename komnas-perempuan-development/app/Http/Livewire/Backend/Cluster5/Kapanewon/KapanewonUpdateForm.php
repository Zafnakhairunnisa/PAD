<?php

namespace App\Http\Livewire\Backend\Cluster5\Kapanewon;

use App\Domains\Cluster5\Models\Kapanewon\Kapanewon;
use App\Http\Livewire\Backend\Cluster5\Kapanewon\Traits\WithKapanewonRules;
use App\Http\Livewire\Backend\Cluster5\Kapanewon\Traits\WithKapanewonService;
use Livewire\Component;
use Livewire\WithFileUploads;

class KapanewonUpdateForm extends Component
{
    use WithKapanewonRules,
        WithKapanewonService,
        WithFileUploads;

    public $existingImages = [];

    public $existingDocuments = [];

    public Kapanewon $kapanewon;

    public function mount()
    {
        $this->kapanewon_kemantren = $this->kapanewon->kapanewon_kemantren;
        $this->kabupaten = $this->kapanewon->kabupaten;
        $this->tahun = $this->kapanewon->tahun;
        $this->ketua_gugus = $this->kapanewon->ketua_gugus;
        $this->no_gugus = $this->kapanewon->no_gugus;
        $this->profil_anak = $this->kapanewon->profil_anak;
        $this->forum_anak = $this->kapanewon->forum_anak;
        $this->ruang_bermain = $this->kapanewon->ruang_bermain;
        $this->pusat_informasi = $this->kapanewon->pusat_informasi;
        $this->pusat_kreatifitas = $this->kapanewon->pusat_kreatifitas;
        $this->satgas_ppa = $this->kapanewon->satgas_ppa;
        $this->patbm = $this->kapanewon->patbm;
        $this->pikr = $this->kapanewon->pikr;
        $this->kawasan_tanpa_rokok = $this->kapanewon->kawasan_tanpa_rokok;

        $this->existingImages = $this->kapanewon->images->map(function ($image) {
            return mapFilepondImages($image);
        });
        $this->existingDocuments = $this->kapanewon->documents->map(function ($document) {
            return mapFilepondDocument($document);
        });
    }

    public function submit()
    {
        $validated = $this->validate();
        $this->service->update($this->kapanewon, $validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil mengubah Kapanewon.')
            );

        return redirect()->route('admin.cluster_5.kapanewon.index');
    }

    public function render()
    {
        return view('backend.cluster_5.kapanewon.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
