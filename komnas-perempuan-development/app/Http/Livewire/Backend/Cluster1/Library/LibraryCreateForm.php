<?php

namespace App\Http\Livewire\Backend\Cluster1\Library;

use App\Domains\Cluster1\Services\Library\LibraryService;
use Livewire\Component;

class LibraryCreateForm extends Component
{
    private LibraryService $service;

    public $name;

    public $year;

    public $value;

    public $parent_id;

    protected $rules = [
        'name' => 'required|string',
        'value' => 'required|numeric',
        'year' => 'required|max:4',
        'parent_id' => 'nullable|exists:perpustakaan_dan_taman_bacaan,id',
    ];

    protected $validationAttributes = [
        'value' => 'Nilai',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        $this->resetValidation($propertyName);
    }

    public function boot(
        LibraryService $libraryService
    ) {
        $this->service = $libraryService;
    }

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()->flash('flash_success', __('Berhasil membuat perpustakaan dan taman bacaan.'));

        return redirect()->route('admin.cluster_1.library.index');
    }

    public function render()
    {
        return view('backend.cluster_1.library.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
