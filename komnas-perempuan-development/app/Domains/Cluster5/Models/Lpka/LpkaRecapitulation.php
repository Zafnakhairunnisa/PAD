<?php

namespace App\Domains\Cluster5\Models\Lpka;

use App\Domains\Cluster5\Models\Lpka\Traits\Scope\LpkaRecapitulationScope;
use App\Models\Model;

class LpkaRecapitulation extends Model
{
    use LpkaRecapitulationScope;

    protected static $logName = 'lpka';

    protected $fillable = [
        'value',
        'year',
        'location_id',
        'category_id',
        'gender',
    ];

    public function location()
    {
        return $this->belongsTo(\App\Models\Location::class);
    }

    public function category()
    {
        return $this->belongsTo(LpkaRecapitulationCategory::class);
    }
}
