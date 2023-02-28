<?php

namespace App\Http\Livewire\Backend\Cluster5\Bapas\Recapitulation;

use App\Http\Livewire\Backend\Cluster5\Bapas\Traits\WithBapasRecapitulationService;
use Livewire\Component;

class BapasRecapitulationList extends Component
{
    use WithBapasRecapitulationService;

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
                __('Berhasil menghapus rekapitulasi Balai Pemasyarakatan.')
            );

        return redirect()
            ->route('admin.cluster_5.bapas.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_5.bapas.recapitulation.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
