<?php

namespace App\Http\Livewire\Backend\Cluster2\ChildFriendlyPlayroom\Recapitulation;

use App\Domains\Cluster2\Services\ChildFriendlyPlayroom\ChildFriendlyPlayroomRecapitulationService;
use Livewire\Component;

class ChildFriendlyPlayroomRecapitulationList extends Component
{
    private ChildFriendlyPlayroomRecapitulationService $service;

    protected $listeners = [
        'delete' => 'delete',
    ];

    public function boot(ChildFriendlyPlayroomRecapitulationService $service)
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
            ->flash('flash_success', __('Berhasil menghapus rekapitulasi ruang bermain ramah anak.'));

        return redirect()->route('admin.cluster_2.child_friendly_playroom.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_2.child_friendly_playroom.recapitulation.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
