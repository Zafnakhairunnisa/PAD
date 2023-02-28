<?php

namespace App\Domains\Cluster5\Models\Patbm;

use App\Domains\Cluster5\Models\Patbm\Traits\Scope\PatbmRecapitulationScope;
use App\Models\Model;
use Database\Factories\Cluster5\PatbmRecapitulationFactory;

class PatbmRecapitulation extends Model
{
    use PatbmRecapitulationScope;

    protected static $logName = 'patbm';

    protected $fillable = [
        'value',
        'year',
        'location_id',
        'category_id',
    ];

    public function location()
    {
        return $this->belongsTo(\App\Models\Location::class);
    }

    public function category()
    {
        return $this->belongsTo(PatbmRecapitulationCategory::class);
    }
}
