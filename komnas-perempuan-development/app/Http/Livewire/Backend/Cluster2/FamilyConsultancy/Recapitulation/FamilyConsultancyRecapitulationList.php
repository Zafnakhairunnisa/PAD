<?php

namespace App\Http\Livewire\Backend\Cluster2\FamilyConsultancy\Recapitulation;

use App\Domains\Cluster2\Services\FamilyConsultancy\FamilyConsultancyRecapitulationService;
use Livewire\Component;

class FamilyConsultancyRecapitulationList extends Component
{
    private FamilyConsultancyRecapitulationService $service;

    protected $listeners = [
        'delete' => 'delete',
    ];

    public function boot(FamilyConsultancyRecapitulationService $service)
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
            ->flash('flash_success', __('Berhasil menghapus rekapitulasi lembaga konsultasi keluarga.'));

        return redirect()->route('admin.cluster_2.family_consultancy.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_2.family_consultancy.recapitulation.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
