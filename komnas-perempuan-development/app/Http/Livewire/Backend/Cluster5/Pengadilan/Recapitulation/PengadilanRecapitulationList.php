<?php

namespace App\Http\Livewire\Backend\Cluster5\Pengadilan\Recapitulation;

use App\Http\Livewire\Backend\Cluster5\Pengadilan\Traits\WithPengadilanRecapitulationService;
use Livewire\Component;

class PengadilanRecapitulationList extends Component
{
    use WithPengadilanRecapitulationService;

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
                __('Berhasil menghapus rekapitulasi Pengadilan DIY.')
            );

        return redirect()
            ->route('admin.cluster_5.pengadilan.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_5.pengadilan.recapitulation.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
