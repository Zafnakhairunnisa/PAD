<?php

namespace App\Domains\Cluster4\Models\Education;

use App\Domains\Cluster4\Models\Education\Traits\Scope\EducationRecapitulationScope;
use App\Models\Model;
use Database\Factories\Cluster4\Education\EducationRecapitulationFactory;

class EducationRecapitulation extends Model
{
    use EducationRecapitulationScope;

    protected static $logName = 'education';

    protected $fillable = [
        'value',
        'year',
        'gender',
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
        return EducationRecapitulationFactory::new();
    }

    public function location()
    {
        return $this->belongsTo(\App\Models\Location::class);
    }

    public function category()
    {
        return $this->belongsTo(EducationRecapitulationCategory::class);
    }
}
