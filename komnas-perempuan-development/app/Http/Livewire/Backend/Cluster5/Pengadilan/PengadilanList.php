<?php

namespace App\Http\Livewire\Backend\Cluster5\Pengadilan;

use App\Http\Livewire\Backend\Cluster5\Pengadilan\Traits\WithPengadilanService;
use Livewire\Component;

class PengadilanList extends Component
{
    use WithPengadilanService;

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
                __('Berhasil menghapus Pengadilan DIY.')
            );

        return redirect()
            ->route('admin.cluster_5.pengadilan.index');
    }

    public function render()
    {
        return view('backend.cluster_5.pengadilan.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
