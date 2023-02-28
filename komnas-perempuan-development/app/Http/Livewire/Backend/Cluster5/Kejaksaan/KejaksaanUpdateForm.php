<?php

namespace App\Http\Livewire\Backend\Cluster5\Kejaksaan;

use App\Domains\Cluster5\Models\Kejaksaan\Kejaksaan;
use App\Http\Livewire\Backend\Cluster5\Kejaksaan\Traits\WithKejaksaanRules;
use App\Http\Livewire\Backend\Cluster5\Kejaksaan\Traits\WithKejaksaanService;
use Livewire\Component;

class KejaksaanUpdateForm extends Component
{
    use WithKejaksaanRules,
        WithKejaksaanService;

    public $existingImages = [];

    public $existingDocuments = [];

    public Kejaksaan $kejaksaan;

    public function mount()
    {
        $this->daftar_sop = $this->kejaksaan->daftar_sop;
        $this->fasilitas = $this->kejaksaan->fasilitas;
        $this->alamat = $this->kejaksaan->alamat;

        $this->existingImages = $this->kejaksaan->images->map(function ($image) {
            return mapFilepondImages($image);
        });
        $this->existingDocuments = $this->kejaksaan->documents->map(function ($document) {
            return mapFilepondDocument($document);
        });
    }

    public function submit()
    {
        $validated = $this->validate();
        $this->service->update($this->kejaksaan, $validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil mengubah Kejaksaan Daerah DIY.')
            );

        return redirect()->route('admin.cluster_5.kejaksaan.index');
    }

    public function render()
    {
        return view('backend.cluster_5.kejaksaan.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
