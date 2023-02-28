<?php

namespace App\Domains\Cluster3\Models\ChildNutrition;

use App\Domains\Cluster3\Models\ChildNutrition\Traits\Scope\ChildNutritionRecapitulationScope;
use App\Models\Model;
use Database\Factories\Cluster3\ChildNutritionRecapitulationFactory;

class ChildNutritionRecapitulation extends Model
{
    use ChildNutritionRecapitulationScope;

    protected static $logName = 'child_nutrition_recapitulation';

    protected $fillable = [
        'value',
        'year',
        'location_id',
        'category_id',
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return ChildNutritionRecapitulationFactory::new();
    }

    public function location()
    {
        return $this->belongsTo(\App\Models\Location::class);
    }

    public function category()
    {
        return $this->belongsTo(ChildNutritionRecapitulationCategory::class, 'category_id');
    }
}
