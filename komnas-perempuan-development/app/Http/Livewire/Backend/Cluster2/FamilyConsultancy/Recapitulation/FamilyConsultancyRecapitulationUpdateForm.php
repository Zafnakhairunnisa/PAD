<?php

namespace App\Http\Livewire\Backend\Cluster2\FamilyConsultancy\Recapitulation;

use App\Domains\Cluster2\Models\FamilyConsultancyRecapitulation;
use App\Domains\Cluster2\Services\FamilyConsultancy\FamilyConsultancyRecapitulationService;
use Livewire\Component;

class FamilyConsultancyRecapitulationUpdateForm extends Component
{
    private FamilyConsultancyRecapitulationService $service;

    public FamilyConsultancyRecapitulation $recapitulation;

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
        FamilyConsultancyRecapitulationService $recapitulationService
    ) {
        $this->service = $recapitulationService;
    }

    public function mount()
    {
        $this->category = $this->recapitulation->category;
        $this->value = $this->recapitulation->value;
        $this->year = $this->recapitulation->year;
        $this->location_id = $this->recapitulation->location_id;
    }

    public function submit()
    {
        $validated = $this->validate();
        $this->service->update($this->recapitulation, $validated);

        session()->flash('flash_success', __('Berhasil mengubah rekapitulasi lembaga konsultasi keluarga.'));

        return redirect()->route('admin.cluster_2.family_consultancy.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_2.family_consultancy.recapitulation.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
