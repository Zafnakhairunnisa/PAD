<?php

namespace App\Domains\Cluster5\Models\Pengadilan;

use App\Domains\Cluster5\Models\Pengadilan\Traits\Scope\PengadilanRecapitulationScope;
use App\Models\Model;

class PengadilanRecapitulation extends Model
{
    use PengadilanRecapitulationScope;

    protected static $logName = 'pengadilan_rekapitulasi';

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
        return $this->belongsTo(PengadilanRecapitulationCategory::class);
    }
}
