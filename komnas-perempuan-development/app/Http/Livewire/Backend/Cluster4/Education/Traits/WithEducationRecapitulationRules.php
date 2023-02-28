<?php

namespace App\Http\Livewire\Backend\Cluster4\Education\Traits;

trait WithEducationRecapitulationRules
{
    public $year;

    public $gender;

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
            'gender' => 'required|in:l,p',
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
