<?php

namespace App\Http\Livewire\Backend\Institutional\Kelurahan\Recapitulation;

use App\Http\Livewire\Backend\Institutional\Kelurahan\Traits\WithKelurahanRecapitulationService;
use Livewire\Component;

class KelurahanRecapitulationList extends Component
{
    use WithKelurahanRecapitulationService;

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
                __('Berhasil menghapus rekapitulasi Kelurahan.')
            );

        return redirect()
            ->route('admin.institutional.kelurahan.recapitulation.index');
    }

    public function render()
    {
        return view('backend.institutional.kelurahan.recapitulation.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
