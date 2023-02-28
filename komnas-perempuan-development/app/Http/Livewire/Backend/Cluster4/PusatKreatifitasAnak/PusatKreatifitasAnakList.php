<?php

namespace App\Http\Livewire\Backend\Cluster4\PusatKreatifitasAnak;

use App\Http\Livewire\Backend\Cluster4\PusatKreatifitasAnak\Traits\WithPusatKreatifitasAnakService;
use Livewire\Component;

class PusatKreatifitasAnakList extends Component
{
    use WithPusatKreatifitasAnakService;

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
                __('Berhasil menghapus pusat kreatifitas anak.')
            );

        return redirect()
            ->route('admin.cluster_4.pusat_kreatifitas_anak.index');
    }

    public function render()
    {
        return view('backend.cluster_4.pusat_kreatifitas_anak.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
