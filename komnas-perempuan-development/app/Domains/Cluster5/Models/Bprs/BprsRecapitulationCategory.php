<?php

namespace App\Domains\Cluster5\Models\Bprs;

use App\Models\Model;

class BprsRecapitulationCategory extends Model
{
    protected static $logName = 'bprs_rekapitulasi_category';

    protected $fillable = [
        'name',
    ];
}
