<?php

namespace App\Http\Livewire\Backend\Cluster5\Lpka;

use App\Domains\Cluster5\Models\Lpka\Lpka;
use App\Http\Livewire\Backend\Cluster5\Lpka\Traits\WithLpkaRules;
use App\Http\Livewire\Backend\Cluster5\Lpka\Traits\WithLpkaService;
use Livewire\Component;
use Livewire\WithFileUploads;

class LpkaUpdateForm extends Component
{
    use WithLpkaRules,
        WithLpkaService,
        WithFileUploads;

    public $existingImages = [];

    public $existingDocuments = [];

    public Lpka $lpka;

    public function mount()
    {
        $this->daftar_sop = $this->lpka->daftar_sop;
        $this->jenis_ruangan = $this->lpka->jenis_ruangan;
        $this->sarana_prasarana = $this->lpka->sarana_prasarana;
        $this->alamat = $this->lpka->alamat;

        $this->existingImages = $this->lpka->images->map(function ($image) {
            return mapFilepondImages($image);
        });
        $this->existingDocuments = $this->lpka->documents->map(function ($document) {
            return mapFilepondDocument($document);
        });
    }

    public function submit()
    {
        $validated = $this->validate();
        $this->service->update($this->lpka, $validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil mengubah Lembaga Pembinaan Khusus Anak Yogyakarta.')
            );

        return redirect()->route('admin.cluster_5.lpka.index');
    }

    public function render()
    {
        return view('backend.cluster_5.lpka.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
