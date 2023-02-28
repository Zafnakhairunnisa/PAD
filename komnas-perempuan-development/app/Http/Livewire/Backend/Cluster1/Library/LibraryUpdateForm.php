<?php

namespace App\Http\Livewire\Backend\Cluster1\Library;

use App\Domains\Cluster1\Models\Library;
use App\Domains\Cluster1\Services\Library\LibraryService;
use Livewire\Component;

class LibraryUpdateForm extends Component
{
    private LibraryService $service;

    public Library $library;

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

    public function mount()
    {
        $this->name = $this->library->category;
        $this->value = $this->library->value;
        $this->year = $this->library->year;
        $this->parent_id = $this->library->parent_id;
    }

    public function submit()
    {
        $validated = $this->validate();
        $this->service->update($this->library, $validated);

        session()->flash('flash_success', __('Berhasil membuat perpustakaan dan taman bacaan.'));

        return redirect()->route('admin.cluster_1.library.index');
    }

    public function render()
    {
        return view('backend.cluster_1.library.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
