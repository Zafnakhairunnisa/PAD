<?php

namespace App\Domains\Cluster5\Models\Kejaksaan;

use App\Models\Model;

class KejaksaanRecapitulationCategory extends Model
{
    protected static $logName = 'kejaksaan_rekapitulasi_category';

    protected $fillable = [
        'name',
    ];
}
