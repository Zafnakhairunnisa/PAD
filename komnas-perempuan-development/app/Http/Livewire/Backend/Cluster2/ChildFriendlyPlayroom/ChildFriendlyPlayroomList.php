<?php

namespace App\Http\Livewire\Backend\Cluster2\ChildFriendlyPlayroom;

use App\Domains\Cluster2\Services\ChildFriendlyPlayroom\ChildFriendlyPlayroomService;
use Livewire\Component;

class ChildFriendlyPlayroomList extends Component
{
    private ChildFriendlyPlayroomService $service;

    protected $listeners = [
        'delete' => 'delete',
    ];

    public function boot(ChildFriendlyPlayroomService $service)
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
            ->flash('flash_success', __('Berhasil menghapus ruang bermain ramah anak.'));

        return redirect()->route('admin.cluster_2.child_friendly_playroom.index');
    }

    public function render()
    {
        return view('backend.cluster_2.child_friendly_playroom.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
