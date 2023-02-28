<?php

namespace App\Http\Livewire\Backend\Cluster4\RumahIbadahRamahAnak\Traits;

trait WithRumahIbadahRamahAnakRecapitulationRules
{
    public $year;

    public $value;

    public $location_id;

    public $category_id;

    protected $validationAttributes = [
        'value' => 'Nilai',
        'category_id' => 'Kategori',
    ];

    protected function rules()
    {
        return [
            'value' => 'required|numeric',
            'year' => 'required|max:4',
            'location_id' => 'required|exists:locations,id',
            'category_id' => 'required|exists:child_nutrition_recapitulation_categories,id',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        $this->resetValidation($propertyName);
    }
}
