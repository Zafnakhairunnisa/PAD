<?php

namespace App\Http\Livewire\Backend\Cluster2\FamilyConsultancy\Recapitulation;

use App\Domains\Cluster2\Services\FamilyConsultancy\FamilyConsultancyRecapitulationService;
use Livewire\Component;

class FamilyConsultancyRecapitulationCreateForm extends Component
{
    private $service;

    public $category;

    public $year;

    public $value;

    public $location_id;

    protected $validationAttributes = [
        'category' => 'Kategori',
        'value' => 'Nilai',
    ];

    protected function rules()
    {
        $allowedCategories = implode(',',
            config('constants.family_consultancy.recapitulation_category')
        );

        return [
            'category' => 'required|string|in:'.$allowedCategories,
            'value' => 'required|numeric',
            'year' => 'required|max:4',
            'location_id' => 'required|exists:locations,id',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        $this->resetValidation($propertyName);
    }

    public function boot(
        FamilyConsultancyRecapitulationService $familyConsultancyRecapitulationService
    ) {
        $this->service = $familyConsultancyRecapitulationService;
    }

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()->flash('flash_success', __('Berhasil membuat rekapitulasi lembaga konsultasi keluarga.'));

        return redirect()->route('admin.cluster_2.family_consultancy.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_2.family_consultancy.recapitulation.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
