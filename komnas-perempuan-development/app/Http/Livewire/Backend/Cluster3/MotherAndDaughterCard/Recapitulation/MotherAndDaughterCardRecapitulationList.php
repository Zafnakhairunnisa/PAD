<?php

namespace App\Http\Livewire\Backend\Cluster3\MotherAndDaughterCard\Recapitulation;

use App\Domains\Cluster3\Services\MotherAndDaughterCard\MotherAndDaughterCardRecapitulationService;
use Livewire\Component;

class MotherAndDaughterCardRecapitulationList extends Component
{
    private MotherAndDaughterCardRecapitulationService $service;

    protected $listeners = [
        'delete' => 'delete',
    ];

    public function boot(MotherAndDaughterCardRecapitulationService $service)
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
            ->flash('flash_success', __('Berhasil menghapus rekapitulasi kartu ibu dan anak.'));

        return redirect()->route('admin.cluster_3.mother_and_daughter_card.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_3.mother_and_daughter_card.recapitulation.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
