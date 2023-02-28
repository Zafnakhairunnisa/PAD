<?php

namespace App\Http\Livewire\Backend\Cluster4\PusatKreatifitasAnak\Recapitulation;

use App\Http\Livewire\Backend\Cluster4\PusatKreatifitasAnak\Traits\WithPusatKreatifitasAnakRecapitulationService;
use Livewire\Component;

class PusatKreatifitasAnakRecapitulationList extends Component
{
    use WithPusatKreatifitasAnakRecapitulationService;

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
                __('Berhasil menghapus rekapitulasi pusat kreatifitas anak.')
            );

        return redirect()
            ->route('admin.cluster_4.pusat_kreatifitas_anak.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_4.pusat_kreatifitas_anak.recapitulation.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
