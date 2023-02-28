<?php

namespace App\Http\Livewire\Backend\Cluster5\Patbm;

use App\Http\Livewire\Backend\Cluster5\Patbm\Traits\WithPatbmService;
use Livewire\Component;

class PatbmList extends Component
{
    use WithPatbmService;

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
                __('Berhasil menghapus Lembaga Pembinaan Khusus Anak Yogyakarta.')
            );

        return redirect()
            ->route('admin.cluster_5.patbm.index');
    }

    public function render()
    {
        return view('backend.cluster_5.patbm.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
