<?php

namespace App\Http\Livewire\Backend\Cluster5\KekerasanTerhadapAnak\Recapitulation;

use App\Http\Livewire\Backend\Cluster5\KekerasanTerhadapAnak\Traits\WithKekerasanTerhadapAnakRecapitulationService;
use Livewire\Component;

class KekerasanTerhadapAnakRecapitulationList extends Component
{
    use WithKekerasanTerhadapAnakRecapitulationService;

    protected $listeners = [
        'delete' => 'delete',
    ];

    public function delete($id)
    {
        if (is_array($id) && count($id)) {
            foreach ($id as $selectedKey) {
                $this->service->deleteById($selectedKey);
            }
        } else {
            $this->service->deleteById($id);
        }

        session()
            ->flash(
                'flash_success',
                __('Berhasil menghapus rekapitulasi Kekerasan Terhadap Anak.')
            );

        return redirect()
            ->route('admin.cluster_5.kekerasan_terhadap_anak.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_5.kekerasan_terhadap_anak.recapitulation.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
