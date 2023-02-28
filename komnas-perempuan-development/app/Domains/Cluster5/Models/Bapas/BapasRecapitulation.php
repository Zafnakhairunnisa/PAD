<?php

namespace App\Domains\Cluster5\Models\Bapas;

use App\Domains\Cluster5\Models\Bapas\Traits\Scope\BapasRecapitulationScope;
use App\Models\Model;

class BapasRecapitulation extends Model
{
    use BapasRecapitulationScope;

    protected static $logName = 'bapas_rekapitulasi';

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
        return $this->belongsTo(BapasRecapitulationCategory::class);
    }
}
