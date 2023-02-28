<?php

namespace App\Http\Livewire\Backend\Cluster1\ChildIdentityCard;

use App\Domains\Cluster1\Models\ChildIdentityCard;
use App\Domains\Cluster1\Services\ChildIdentityCard\ChildIdentityCardService;
use Livewire\Component;

class ChildIdentityCardUpdateForm extends Component
{
    private ChildIdentityCardService $service;

    public ChildIdentityCard $childIdentityCard;

    public $category;

    public $year;

    public $gender;

    public $value;

    public $location_id;

    protected $rules = [
        'category' => 'required|string',
        'gender' => 'required|in:L,P',
        'value' => 'required|numeric',
        'year' => 'required|max:4',
        'location_id' => 'required|exists:locations,id',
    ];

    protected $validationAttributes = [
        'category' => 'Kategori',
        'value' => 'Nilai',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        $this->resetValidation($propertyName);
    }

    public function boot(
        ChildIdentityCardService $childIdentityCardService
    ) {
        $this->service = $childIdentityCardService;
    }

    public function mount()
    {
        $this->category = $this->childIdentityCard->category;
        $this->gender = $this->childIdentityCard->gender;
        $this->value = $this->childIdentityCard->value;
        $this->year = $this->childIdentityCard->year;
        $this->location_id = $this->childIdentityCard->location_id;
    }

    public function submit()
    {
        $validated = $this->validate();
        $this->service->update($this->childIdentityCard, $validated);

        session()->flash('flash_success', __('Berhasil membuat kepemilikan kartu identitas anak (KIA).'));

        return redirect()->route('admin.cluster_1.child_identity_card.index');
    }

    public function render()
    {
        return view('backend.cluster_1.child_identity_card.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
