<?php

namespace App\Http\Livewire\Backend\Cluster4\RumahIbadahRamahAnak;

use App\Http\Livewire\Backend\Cluster4\RumahIbadahRamahAnak\Traits\WithRumahIbadahRamahAnakService;
use Livewire\Component;

class RumahIbadahRamahAnakList extends Component
{
    use WithRumahIbadahRamahAnakService;

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
                __('Berhasil menghapus rumah ibadah ramah anak.')
            );

        return redirect()
            ->route('admin.cluster_4.rumah_ibadah_ramah_anak.index');
    }

    public function render()
    {
        return view('backend.cluster_4.rumah_ibadah_ramah_anak.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
