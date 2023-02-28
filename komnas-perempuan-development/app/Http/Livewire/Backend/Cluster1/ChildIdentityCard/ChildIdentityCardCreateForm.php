<?php

namespace App\Http\Livewire\Backend\Cluster1\ChildIdentityCard;

use App\Domains\Cluster1\Services\ChildIdentityCard\ChildIdentityCardService;
use Livewire\Component;

class ChildIdentityCardCreateForm extends Component
{
    private ChildIdentityCardService $service;

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

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()->flash('flash_success', __('Berhasil membuat kepemilikan kartu identitas anak (KIA).'));

        return redirect()->route('admin.cluster_1.child_identity_card.index');
    }

    public function render()
    {
        return view('backend.cluster_1.child_identity_card.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
