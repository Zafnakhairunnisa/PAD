<?php

namespace App\Http\Livewire\Backend\Institutional\ChildProtectionIndex;

use App\Domains\Institutional\Models\ChildProtectionIndex;
use App\Domains\Institutional\Services\ChildProtectionIndexService;
use Livewire\Component;

class ChildProtectionIndexUpdateForm extends Component
{
    protected ChildProtectionIndexService $childProtectionIndexService;

    public $childProtectionIndex;

    public $category;

    public $year;

    public $value;

    public $rank;

    public $location_id;

    protected $rules = [
        'category' => 'required|string',
        'year' => 'required|string|max:4',
        'rank' => 'required',
        'value' => 'required',
        'location_id' => 'required',
    ];

    protected $messages = [
        'category.required' => 'Nama kategori harus diisi.',
        'year.required' => 'Tahun terbit indeks perlindungan anak harus diisi.',
        'rank.required' => 'Ranking harus diisi.',
        'value.required' => 'Nilai harus diisi.',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        $this->resetValidation($propertyName);
    }

    public function boot(ChildProtectionIndexService $childProtectionIndexService)
    {
        $this->childProtectionIndexService = $childProtectionIndexService;
    }

    public function mount(ChildProtectionIndex $childProtectionIndex)
    {
        $this->category = $childProtectionIndex->category;
        $this->year = $childProtectionIndex->year;
        $this->value = $childProtectionIndex->value;
        $this->rank = $childProtectionIndex->rank;
        $this->location_id = $childProtectionIndex->location_id;
    }

    public function submit()
    {
        $validated = $this->validate();
        $this->childProtectionIndexService->update($this->childProtectionIndex, $validated);

        session()->flash('flash_success', __('Berhasil mengubah indeks perlindungan anak.'));

        return redirect()->route('admin.institutional.child_protection_index.index');
    }

    public function render()
    {
        return view('backend.institutional.child_protection_index.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
