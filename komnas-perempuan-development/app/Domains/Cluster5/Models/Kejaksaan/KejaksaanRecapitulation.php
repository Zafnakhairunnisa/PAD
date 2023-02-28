<?php

namespace App\Domains\Cluster5\Models\Kejaksaan;

use App\Domains\Cluster5\Models\Kejaksaan\Traits\Scope\KejaksaanRecapitulationScope;
use App\Models\Model;

class KejaksaanRecapitulation extends Model
{
    use KejaksaanRecapitulationScope;

    protected static $logName = 'kejaksaan_rekapitulasi';

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
        return $this->belongsTo(KejaksaanRecapitulationCategory::class);
    }
}
