<?php

namespace App\Http\Livewire\Backend\Cluster5\PekerjaAnak\Recapitulation;

use App\Http\Livewire\Backend\Cluster5\PekerjaAnak\Traits\WithPekerjaAnakRecapitulationService;
use Livewire\Component;

class PekerjaAnakRecapitulationList extends Component
{
    use WithPekerjaAnakRecapitulationService;

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
                __('Berhasil menghapus rekapitulasi pekerja anak.')
            );

        return redirect()
            ->route('admin.cluster_5.pekerja_anak.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_5.pekerja_anak.recapitulation.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
