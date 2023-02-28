<?php

namespace App\Domains\Cluster5\Models\Peksos;

use App\Domains\Cluster5\Models\Peksos\Traits\Scope\PeksosRecapitulationScope;
use App\Models\Model;

class PeksosRecapitulation extends Model
{
    use PeksosRecapitulationScope;

    protected static $logName = 'peksos_rekapitulasi';

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
        return $this->belongsTo(PeksosRecapitulationCategory::class);
    }
}
