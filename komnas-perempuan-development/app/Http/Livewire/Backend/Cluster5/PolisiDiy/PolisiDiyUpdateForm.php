<?php

namespace App\Http\Livewire\Backend\Cluster5\PolisiDiy;

use App\Domains\Cluster5\Models\PolisiDiy\PolisiDiy;
use App\Http\Livewire\Backend\Cluster5\PolisiDiy\Traits\WithPolisiDiyRules;
use App\Http\Livewire\Backend\Cluster5\PolisiDiy\Traits\WithPolisiDiyService;
use Livewire\Component;

class PolisiDiyUpdateForm extends Component
{
    use WithPolisiDiyRules,
        WithPolisiDiyService;

    public $existingImages = [];

    public $existingDocuments = [];

    public PolisiDiy $polisi_diy;

    public function mount()
    {
        $this->daftar_sop = $this->polisi_diy->daftar_sop;
        $this->fasilitas = $this->polisi_diy->fasilitas;
        $this->alamat = $this->polisi_diy->alamat;

        $this->existingImages = $this->polisi_diy->images->map(function ($image) {
            return mapFilepondImages($image);
        });
        $this->existingDocuments = $this->polisi_diy->documents->map(function ($document) {
            return mapFilepondDocument($document);
        });
    }

    public function submit()
    {
        $validated = $this->validate();
        $this->service->update($this->polisi_diy, $validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil mengubah Polisi Daerah DIY.')
            );

        return redirect()->route('admin.cluster_5.polisi_diy.index');
    }

    public function render()
    {
        return view('backend.cluster_5.polisi_diy.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
