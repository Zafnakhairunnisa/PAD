<?php

namespace App\Http\Livewire\Backend\Cluster3\InfantMortality\Recapitulation;

use App\Domains\Cluster3\Services\InfantMortality\InfantMortalityRecapitulationService;
use Livewire\Component;

class InfantMortalityRecapitulationList extends Component
{
    private InfantMortalityRecapitulationService $service;

    protected $listeners = [
        'delete' => 'delete',
    ];

    public function boot(InfantMortalityRecapitulationService $service)
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
            ->flash('flash_success', __('Berhasil menghapus rekapitulasi angka kematian bayi.'));

        return redirect()->route('admin.cluster_2.family_consultancy.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_3.infant_mortality.recapitulation.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
