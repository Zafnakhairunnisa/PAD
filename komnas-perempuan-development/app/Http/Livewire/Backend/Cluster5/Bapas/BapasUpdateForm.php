<?php

namespace App\Http\Livewire\Backend\Cluster5\Bapas;

use App\Domains\Cluster5\Models\Bapas\Bapas;
use App\Http\Livewire\Backend\Cluster5\Bapas\Traits\WithBapasRules;
use App\Http\Livewire\Backend\Cluster5\Bapas\Traits\WithBapasService;
use Livewire\Component;

class BapasUpdateForm extends Component
{
    use WithBapasRules,
        WithBapasService;

    public $existingImages = [];

    public $existingDocuments = [];

    public Bapas $bapas;

    public function mount()
    {
        $this->daftar_sop = $this->bapas->daftar_sop;
        $this->fasilitas = $this->bapas->fasilitas;
        $this->alamat = $this->bapas->alamat;

        $this->existingImages = $this->bapas->images->map(function ($image) {
            return mapFilepondImages($image);
        });
        $this->existingDocuments = $this->bapas->documents->map(function ($document) {
            return mapFilepondDocument($document);
        });
    }

    public function submit()
    {
        $validated = $this->validate();
        $this->service->update($this->bapas, $validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil mengubah Balai Pemasyarakatan.')
            );

        return redirect()->route('admin.cluster_5.bapas.index');
    }

    public function render()
    {
        return view('backend.cluster_5.bapas.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
