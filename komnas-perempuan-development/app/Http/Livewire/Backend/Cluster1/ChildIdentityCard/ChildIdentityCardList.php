<?php

namespace App\Http\Livewire\Backend\Cluster1\ChildIdentityCard;

use App\Domains\Cluster1\Services\ChildIdentityCard\ChildIdentityCardService;
use Livewire\Component;

class ChildIdentityCardList extends Component
{
    private ChildIdentityCardService $service;

    protected $listeners = [
        'delete' => 'delete',
    ];

    public function boot(ChildIdentityCardService $childIdentityCardService)
    {
        $this->service = $childIdentityCardService;
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

        session()->flash('flash_success', __('Berhasil menghapus kepemilikan kartu identitas anak (KIA).'));

        return redirect()->route('admin.cluster_1.child_identity_card.index');
    }

    public function render()
    {
        return view('backend.cluster_1.child_identity_card.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
