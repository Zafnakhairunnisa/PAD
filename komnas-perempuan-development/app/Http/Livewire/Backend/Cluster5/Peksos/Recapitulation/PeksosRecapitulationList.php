<?php

namespace App\Http\Livewire\Backend\Cluster5\Peksos\Recapitulation;

use App\Http\Livewire\Backend\Cluster5\Peksos\Traits\WithPeksosRecapitulationService;
use Livewire\Component;

class PeksosRecapitulationList extends Component
{
    use WithPeksosRecapitulationService;

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
                __('Berhasil menghapus rekapitulasi Pekerja Sosial.')
            );

        return redirect()
            ->route('admin.cluster_5.peksos.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_5.peksos.recapitulation.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
