<?php

namespace App\Http\Livewire\Backend\Cluster1\Library;

use App\Domains\Cluster1\Services\Library\LibraryService;
use Livewire\Component;

class LibraryList extends Component
{
    private LibraryService $service;

    protected $listeners = [
        'delete' => 'delete',
    ];

    public function boot(LibraryService $childForumService)
    {
        $this->service = $childForumService;
    }

    public function delete($id)
    {
        if (is_array($id) && count($id)) {
            foreach ($id as $selectedKey) {
                $this->service->deleteById($selectedKey);
            }
        } else {
            $this->service->deleteById($id);
        }

        session()->flash('flash_success', __('Berhasil menghapus perpustakaan dan taman bacaan.'));

        return redirect()->route('admin.cluster_1.library.index');
    }

    public function render()
    {
        return view('backend.cluster_1.library.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
