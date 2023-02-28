<?php

namespace App\Http\Livewire\Backend\Cluster5\Kapanewon\Recapitulation;

use App\Http\Livewire\Backend\Cluster5\Kapanewon\Traits\WithKapanewonRecapitulationService;
use Livewire\Component;

class KapanewonRecapitulationList extends Component
{
    use WithKapanewonRecapitulationService;

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
                __('Berhasil menghapus rekapitulasi Kapanewon.')
            );

        return redirect()
            ->route('admin.cluster_5.kapanewon.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_5.kapanewon.recapitulation.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
