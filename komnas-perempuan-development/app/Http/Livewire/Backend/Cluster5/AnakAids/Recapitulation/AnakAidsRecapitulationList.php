<?php

namespace App\Http\Livewire\Backend\Cluster5\AnakAids\Recapitulation;

use App\Http\Livewire\Backend\Cluster5\AnakAids\Traits\WithAnakAidsRecapitulationService;
use Livewire\Component;

class AnakAidsRecapitulationList extends Component
{
    use WithAnakAidsRecapitulationService;

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
                __('Berhasil menghapus rekapitulasi anak aids.')
            );

        return redirect()
            ->route('admin.cluster_5.anak_aids.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_5.anak_aids.recapitulation.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
