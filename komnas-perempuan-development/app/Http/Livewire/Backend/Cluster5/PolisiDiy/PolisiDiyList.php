<?php

namespace App\Http\Livewire\Backend\Cluster5\PolisiDiy;

use App\Http\Livewire\Backend\Cluster5\PolisiDiy\Traits\WithPolisiDiyService;
use Livewire\Component;

class PolisiDiyList extends Component
{
    use WithPolisiDiyService;

    protected $listeners = [
        'delete' => 'delete',
    ];

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
            ->flash(
                'flash_success',
                __('Berhasil menghapus Polisi Daerah DIY.')
            );

        return redirect()
            ->route('admin.cluster_5.polisi_diy.index');
    }

    public function render()
    {
        return view('backend.cluster_5.polisi_diy.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
