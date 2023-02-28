<?php

namespace App\Http\Livewire\Backend\Cluster5\Peksos;

use App\Domains\Cluster5\Models\Peksos\Peksos;
use App\Http\Livewire\Backend\Cluster5\Peksos\Traits\WithPeksosRules;
use App\Http\Livewire\Backend\Cluster5\Peksos\Traits\WithPeksosService;
use Livewire\Component;

class PeksosUpdateForm extends Component
{
    use WithPeksosRules,
        WithPeksosService;

    public $existingImages = [];

    public $existingDocuments = [];

    public Peksos $peksos;

    public function mount()
    {
        $this->daftar_sop = $this->peksos->daftar_sop;
        $this->fasilitas = $this->peksos->fasilitas;
        $this->alamat = $this->peksos->alamat;

        $this->existingImages = $this->peksos->images->map(function ($image) {
            return mapFilepondImages($image);
        });
        $this->existingDocuments = $this->peksos->documents->map(function ($document) {
            return mapFilepondDocument($document);
        });
    }

    public function submit()
    {
        $validated = $this->validate();
        $this->service->update($this->peksos, $validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil mengubah Pekerja Sosial.')
            );

        return redirect()->route('admin.cluster_5.peksos.index');
    }

    public function render()
    {
        return view('backend.cluster_5.peksos.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
