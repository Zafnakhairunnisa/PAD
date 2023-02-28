<?php

namespace App\Http\Livewire\Backend\Cluster3\ChildBirth\Recapitulation;

use App\Domains\Cluster3\Services\ChildBirth\ChildBirthRecapitulationService;
use Livewire\Component;

class ChildBirthRecapitulationList extends Component
{
    private ChildBirthRecapitulationService $service;

    protected $listeners = [
        'delete' => 'delete',
    ];

    public function boot(ChildBirthRecapitulationService $service)
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
            ->flash('flash_success', __('Berhasil menghapus rekapitulasi persalinan di fasilitas kesehatan.'));

        return redirect()->route('admin.cluster_3.child_birth.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_3.child_birth.recapitulation.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
