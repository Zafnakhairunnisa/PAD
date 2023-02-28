<?php

namespace App\Domains\Cluster5\Models\AnakAids;

use App\Domains\Cluster5\Models\AnakAids\Traits\Scope\AnakAidsRecapitulationScope;
use App\Models\Model;

class AnakAidsRecapitulation extends Model
{
    use AnakAidsRecapitulationScope;

    protected static $logName = 'anak_aids';

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
        return $this->belongsTo(AnakAidsRecapitulationCategory::class);
    }
}
