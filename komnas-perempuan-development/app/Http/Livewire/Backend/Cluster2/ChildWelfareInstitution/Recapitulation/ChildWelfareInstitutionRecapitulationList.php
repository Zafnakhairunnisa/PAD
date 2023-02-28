<?php

namespace App\Http\Livewire\Backend\Cluster2\ChildWelfareInstitution\Recapitulation;

use App\Domains\Cluster2\Services\ChildWelfareInstitution\ChildWelfareInstitutionRecapitulationService;
use Livewire\Component;

class ChildWelfareInstitutionRecapitulationList extends Component
{
    private ChildWelfareInstitutionRecapitulationService $service;

    protected $listeners = [
        'delete' => 'delete',
    ];

    public function boot(ChildWelfareInstitutionRecapitulationService $service)
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
            ->flash('flash_success', __('Berhasil menghapus rekapitulasi lembaga kesejahteraan sosial anak.'));

        return redirect()->route('admin.cluster_2.child_welfare_institution.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_2.child_welfare_institution.recapitulation.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
