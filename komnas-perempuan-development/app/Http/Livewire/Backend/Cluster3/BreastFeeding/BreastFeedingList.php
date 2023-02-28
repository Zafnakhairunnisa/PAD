<?php

namespace App\Http\Livewire\Backend\Cluster3\BreastFeeding;

use App\Http\Livewire\Backend\Cluster3\BreastFeeding\Traits\WithBreastFeedingService;
use Livewire\Component;

class BreastFeedingList extends Component
{
    use WithBreastFeedingService;

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
                __('Berhasil menghapus pemberian air susu ibu.')
            );

        return redirect()
            ->route('admin.cluster_3.breast_feeding.index');
    }

    public function render()
    {
        return view('backend.cluster_3.breast_feeding.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
