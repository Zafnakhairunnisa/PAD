<?php

namespace App\Domains\Cluster3\Models\BreastFeeding;

use App\Models\Model;
use Database\Factories\Cluster3\BreastFeeding\BreastFeedingRecapitulationCategoryFactory;

class BreastFeedingRecapitulationCategory extends Model
{
    protected static $logName = 'breast_feeding_recapitulation_category';

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
        return BreastFeedingRecapitulationCategoryFactory::new();
    }
}
