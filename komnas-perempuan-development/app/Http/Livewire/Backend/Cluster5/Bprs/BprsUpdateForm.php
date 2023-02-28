<?php

namespace App\Http\Livewire\Backend\Cluster5\Bprs;

use App\Domains\Cluster5\Models\Bprs\Bprs;
use App\Http\Livewire\Backend\Cluster5\Bprs\Traits\WithBprsRules;
use App\Http\Livewire\Backend\Cluster5\Bprs\Traits\WithBprsService;
use Livewire\Component;
use Livewire\WithFileUploads;

class BprsUpdateForm extends Component
{
    use WithBprsRules,
        WithBprsService,
        WithFileUploads;

    public $existingImages = [];

    public $existingDocuments = [];

    public Bprs $bprs;

    public function mount()
    {
        $this->daftar_sop = $this->bprs->daftar_sop;
        $this->sarana_prasarana = $this->bprs->sarana_prasarana;
        $this->alamat = $this->bprs->alamat;

        $this->existingImages = $this->bprs->images->map(function ($image) {
            return mapFilepondImages($image);
        });
        $this->existingDocuments = $this->bprs->documents->map(function ($document) {
            return mapFilepondDocument($document);
        });
    }

    public function submit()
    {
        $validated = $this->validate();
        $this->service->update($this->bprs, $validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil mengubah balai perlindungan dan rehabilitasi sosial remaja (BPRSR) DIY.')
            );

        return redirect()->route('admin.cluster_5.bprs.index');
    }

    public function render()
    {
        return view('backend.cluster_5.bprs.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
