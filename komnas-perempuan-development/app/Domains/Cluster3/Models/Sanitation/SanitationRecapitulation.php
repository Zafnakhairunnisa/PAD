<?php

namespace App\Domains\Cluster3\Models\Sanitation;

use App\Domains\Cluster3\Models\Sanitation\Traits\Scope\SanitationRecapitulationScope;
use App\Models\Model;
use Database\Factories\Cluster3\Sanitation\SanitationRecapitulationFactory;

class SanitationRecapitulation extends Model
{
    use SanitationRecapitulationScope;

    protected static $logName = 'sanitation_recapitulation';

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
        return SanitationRecapitulationFactory::new();
    }

    public function location()
    {
        return $this->belongsTo(\App\Models\Location::class);
    }

    public function category()
    {
        return $this->belongsTo(SanitationRecapitulationCategory::class, 'category_id');
    }
}
