<?php

namespace App\Http\Livewire\Backend\Institutional\Kapanewon;

use App\Http\Livewire\Backend\Institutional\Kapanewon\Traits\WithKapanewonService;
use Livewire\Component;

class KapanewonList extends Component
{
    use WithKapanewonService;

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
                __('Berhasil menghapus Kapanewon.')
            );

        return redirect()
            ->route('admin.institutional.kapanewon.index');
    }

    public function render()
    {
        return view('backend.institutional.kapanewon.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
