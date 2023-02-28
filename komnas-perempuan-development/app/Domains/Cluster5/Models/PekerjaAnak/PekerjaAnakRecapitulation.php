<?php

namespace App\Domains\Cluster5\Models\PekerjaAnak;

use App\Domains\Cluster5\Models\PekerjaAnak\Traits\Scope\PekerjaAnakRecapitulationScope;
use App\Models\Model;

class PekerjaAnakRecapitulation extends Model
{
    use PekerjaAnakRecapitulationScope;

    protected static $logName = 'peker';

    protected $fillable = [
        'value',
        'year',
        'location_id',
        'gender',
    ];

    public function location()
    {
        return $this->belongsTo(\App\Models\Location::class);
    }
}
