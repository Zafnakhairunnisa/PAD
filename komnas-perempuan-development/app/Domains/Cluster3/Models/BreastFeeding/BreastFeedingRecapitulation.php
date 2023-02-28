<?php

namespace App\Domains\Cluster3\Models\BreastFeeding;

use App\Domains\Cluster3\Models\BreastFeeding\Traits\Scope\BreastFeedingRecapitulationScope;
use App\Models\Model;
use Database\Factories\Cluster3\BreastFeedingRecapitulationFactory;

class BreastFeedingRecapitulation extends Model
{
    use BreastFeedingRecapitulationScope;

    protected static $logName = 'breast_feeding_recapitulation';

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
        return BreastFeedingRecapitulationFactory::new();
    }

    public function location()
    {
        return $this->belongsTo(\App\Models\Location::class);
    }

    public function category()
    {
        return $this->belongsTo(BreastFeedingRecapitulationCategory::class, 'category_id');
    }
}
