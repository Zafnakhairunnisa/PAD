<?php

namespace App\Domains\Cluster5\Models\Patbm;

use App\Models\Model;

class PatbmRecapitulationCategory extends Model
{
    protected static $logName = 'patbm_rekapitulasi_category';

    protected $fillable = [
        'name',
    ];
}
