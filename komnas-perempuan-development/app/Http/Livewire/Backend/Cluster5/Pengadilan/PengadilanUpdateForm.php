<?php

namespace App\Http\Livewire\Backend\Cluster5\Pengadilan;

use App\Domains\Cluster5\Models\Pengadilan\Pengadilan;
use App\Http\Livewire\Backend\Cluster5\Pengadilan\Traits\WithPengadilanRules;
use App\Http\Livewire\Backend\Cluster5\Pengadilan\Traits\WithPengadilanService;
use Livewire\Component;

class PengadilanUpdateForm extends Component
{
    use WithPengadilanRules,
        WithPengadilanService;

    public $existingImages = [];

    public $existingDocuments = [];

    public Pengadilan $pengadilan;

    public function mount()
    {
        $this->daftar_sop = $this->pengadilan->daftar_sop;
        $this->sarana_prasarana = $this->pengadilan->sarana_prasarana;
        $this->alamat = $this->pengadilan->alamat;

        $this->existingImages = $this->pengadilan->images->map(function ($image) {
            return mapFilepondImages($image);
        });
        $this->existingDocuments = $this->pengadilan->documents->map(function ($document) {
            return mapFilepondDocument($document);
        });
    }

    public function submit()
    {
        $validated = $this->validate();
        $this->service->update($this->pengadilan, $validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil mengubah Pengadilan DIY.')
            );

        return redirect()->route('admin.cluster_5.pengadilan.index');
    }

    public function render()
    {
        return view('backend.cluster_5.pengadilan.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
