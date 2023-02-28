<?php

namespace App\Http\Livewire\Backend\Cluster5\Patbm;

use App\Domains\Cluster5\Models\Patbm\Patbm;
use App\Http\Livewire\Backend\Cluster5\Patbm\Traits\WithPatbmRules;
use App\Http\Livewire\Backend\Cluster5\Patbm\Traits\WithPatbmService;
use Livewire\Component;
use Livewire\WithFileUploads;

class PatbmUpdateForm extends Component
{
    use WithPatbmRules,
        WithPatbmService,
        WithFileUploads;

    public $existingImages = [];

    public $existingDocuments = [];

    public Patbm $patbm;

    public function mount()
    {
        $this->nama = $this->patbm->nama;
        $this->tahun = $this->patbm->tahun;
        $this->alamat = $this->patbm->alamat;
        $this->kelurahan = $this->patbm->kelurahan;
        $this->kapanewon = $this->patbm->kapanewon;
        $this->kabupaten = $this->patbm->kabupaten;
        $this->medsos = $this->patbm->medsos;
        $this->ketua = $this->patbm->ketua;
        $this->no_telp = $this->patbm->no_telp;
        $this->fasilitas = $this->patbm->fasilitas;
        $this->kegiatan = $this->patbm->kegiatan;
        $this->prestasi = $this->patbm->prestasi;

        $this->existingImages = $this->patbm->images->map(function ($image) {
            return mapFilepondImages($image);
        });
        $this->existingDocuments = $this->patbm->documents->map(function ($document) {
            return mapFilepondDocument($document);
        });
    }

    public function submit()
    {
        $validated = $this->validate();
        $this->service->update($this->patbm, $validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil mengubah Perlindungan Anak Terpadu Berbasis Masyarakat (PATBM).')
            );

        return redirect()->route('admin.cluster_5.patbm.index');
    }

    public function render()
    {
        return view('backend.cluster_5.patbm.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
