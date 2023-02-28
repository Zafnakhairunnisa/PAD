<?php

namespace App\Http\Livewire\Backend\Institutional\Kelurahan;

use App\Http\Livewire\Backend\Institutional\Kelurahan\Traits\WithKelurahanService;
use Livewire\Component;

class KelurahanList extends Component
{
    use WithKelurahanService;

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
                __('Berhasil menghapus Kelurahan.')
            );

        return redirect()
            ->route('admin.institutional.kelurahan.index');
    }

    public function render()
    {
        return view('backend.institutional.kelurahan.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
