<?php

namespace App\Http\Livewire\Backend\Cluster5\PolisiDiy\Recapitulation;

use App\Http\Livewire\Backend\Cluster5\PolisiDiy\Traits\WithPolisiDiyRecapitulationService;
use Livewire\Component;

class PolisiDiyRecapitulationList extends Component
{
    use WithPolisiDiyRecapitulationService;

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
                __('Berhasil menghapus rekapitulasi Polisi Daerah DIY.')
            );

        return redirect()
            ->route('admin.cluster_5.polisi_diy.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_5.polisi_diy.recapitulation.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
