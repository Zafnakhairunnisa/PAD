<?php

namespace App\Domains\Cluster3\Models\ChildNutrition;

use App\Models\Model;
use Database\Factories\Cluster3\ChildNutritionRecapitulationCategoryFactory;

class ChildNutritionRecapitulationCategory extends Model
{
    protected static $logName = 'child_nutrition_recapitulation_category';

    protected $fillable = [
        'name',
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return ChildNutritionRecapitulationCategoryFactory::new();
    }
}
