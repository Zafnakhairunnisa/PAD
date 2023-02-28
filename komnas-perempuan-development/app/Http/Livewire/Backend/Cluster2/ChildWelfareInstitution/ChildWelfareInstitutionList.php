<?php

namespace App\Http\Livewire\Backend\Cluster2\ChildWelfareInstitution;

use App\Domains\Cluster2\Services\ChildWelfareInstitution\ChildWelfareInstitutionService;
use Livewire\Component;

class ChildWelfareInstitutionList extends Component
{
    private ChildWelfareInstitutionService $service;

    protected $listeners = [
        'delete' => 'delete',
    ];

    public function boot(ChildWelfareInstitutionService $service)
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
            ->flash('flash_success', __('Berhasil menghapus lembaga kesejahteraan sosial anak.'));

        return redirect()->route('admin.cluster_2.child_welfare_institution.index');
    }

    public function render()
    {
        return view('backend.cluster_2.child_welfare_institution.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
