<?php

namespace App\Http\Livewire\Backend\Cluster5\Bapas;

use App\Http\Livewire\Backend\Cluster5\Bapas\Traits\WithBapasService;
use Livewire\Component;

class BapasList extends Component
{
    use WithBapasService;

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
                __('Berhasil menghapus Balai Pemasyarakatan.')
            );

        return redirect()
            ->route('admin.cluster_5.bapas.index');
    }

    public function render()
    {
        return view('backend.cluster_5.bapas.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
