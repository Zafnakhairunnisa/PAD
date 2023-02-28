<?php

namespace App\Domains\Cluster5\Models\PolisiDiy;

use App\Domains\Cluster5\Models\PolisiDiy\Traits\Scope\PolisiDiyRecapitulationScope;
use App\Models\Model;

class PolisiDiyRecapitulation extends Model
{
    use PolisiDiyRecapitulationScope;

    protected static $logName = 'polisi_diy_rekapitulasi';

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
        return $this->belongsTo(PolisiDiyRecapitulationCategory::class);
    }
}
