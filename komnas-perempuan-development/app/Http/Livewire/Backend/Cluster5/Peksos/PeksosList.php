<?php

namespace App\Http\Livewire\Backend\Cluster5\Peksos;

use App\Http\Livewire\Backend\Cluster5\Peksos\Traits\WithPeksosService;
use Livewire\Component;

class PeksosList extends Component
{
    use WithPeksosService;

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
                __('Berhasil menghapus Pekerja Sosial.')
            );

        return redirect()
            ->route('admin.cluster_5.peksos.index');
    }

    public function render()
    {
        return view('backend.cluster_5.peksos.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
