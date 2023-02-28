<?php

namespace App\Http\Livewire\Backend\Cluster2\PaudHi\Recapitulation;

use App\Domains\Cluster2\Services\PaudHi\PaudHiRecapitulationService;
use Livewire\Component;

class PaudHiRecapitulationList extends Component
{
    private PaudHiRecapitulationService $service;

    protected $listeners = [
        'delete' => 'delete',
    ];

    public function boot(PaudHiRecapitulationService $service)
    {
        $this->service = $service;
    }

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
            ->flash('flash_success', __('Berhasil menghapus rekapitulasi Paud HI.'));

        return redirect()->route('admin.cluster_2.paud_hi.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_2.paud_hi.recapitulation.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
