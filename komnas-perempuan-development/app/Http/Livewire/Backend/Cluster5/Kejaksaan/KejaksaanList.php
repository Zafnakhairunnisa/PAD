<?php

namespace App\Http\Livewire\Backend\Cluster5\Kejaksaan;

use App\Http\Livewire\Backend\Cluster5\Kejaksaan\Traits\WithKejaksaanService;
use Livewire\Component;

class KejaksaanList extends Component
{
    use WithKejaksaanService;

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
                __('Berhasil menghapus Kejaksaan Daerah DIY.')
            );

        return redirect()
            ->route('admin.cluster_5.kejaksaan.index');
    }

    public function render()
    {
        return view('backend.cluster_5.kejaksaan.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
