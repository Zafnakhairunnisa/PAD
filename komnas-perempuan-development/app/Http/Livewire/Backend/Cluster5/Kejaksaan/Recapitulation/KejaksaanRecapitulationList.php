<?php

namespace App\Http\Livewire\Backend\Cluster5\Kejaksaan\Recapitulation;

use App\Http\Livewire\Backend\Cluster5\Kejaksaan\Traits\WithKejaksaanRecapitulationService;
use Livewire\Component;

class KejaksaanRecapitulationList extends Component
{
    use WithKejaksaanRecapitulationService;

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
                __('Berhasil menghapus rekapitulasi Kejaksaan Daerah DIY.')
            );

        return redirect()
            ->route('admin.cluster_5.kejaksaan.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_5.kejaksaan.recapitulation.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
