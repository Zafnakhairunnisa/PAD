<?php

namespace App\Http\Livewire\Backend\Cluster2\PerkawinanAnak;

use App\Domains\Cluster2\Services\PerkawinanAnak\PerkawinanAnakService;
use Livewire\Component;

class PerkawinanAnakList extends Component
{
    private PerkawinanAnakService $service;

    protected $listeners = [
        'delete' => 'delete',
    ];

    public function boot(PerkawinanAnakService $childForumService)
    {
        $this->service = $childForumService;
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

        session()->flash('flash_success', __('Berhasil menghapus perkawinan anak.'));

        return redirect()->route('admin.cluster_2.perkawinan_anak.index');
    }

    public function render()
    {
        return view('backend.cluster_2.perkawinan_anak.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
