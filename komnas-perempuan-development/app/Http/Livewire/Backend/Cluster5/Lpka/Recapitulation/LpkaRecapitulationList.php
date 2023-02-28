<?php

namespace App\Http\Livewire\Backend\Cluster5\Lpka\Recapitulation;

use App\Http\Livewire\Backend\Cluster5\Lpka\Traits\WithLpkaRecapitulationService;
use Livewire\Component;

class LpkaRecapitulationList extends Component
{
    use WithLpkaRecapitulationService;

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
                __('Berhasil menghapus rekapitulasi Lembaga Pembinaan Khusus Anak Yogyakarta.')
            );

        return redirect()
            ->route('admin.cluster_5.lpka.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_5.lpka.recapitulation.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
