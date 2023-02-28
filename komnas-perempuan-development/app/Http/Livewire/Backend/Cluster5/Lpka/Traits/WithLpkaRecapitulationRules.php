<?php

namespace App\Http\Livewire\Backend\Cluster5\Lpka\Traits;

trait WithLpkaRecapitulationRules
{
    public $year;

    public $value;

    public $gender;

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
            'gender' => 'required|in:L,P',
            'location_id' => 'required|exists:locations,id',
            'category_id' => 'required|exists:lpka_recapitulation_categories,id',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        $this->resetValidation($propertyName);
    }
}
