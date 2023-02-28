<?php

namespace App\Domains\Cluster5\Models\PolisiDiy;

use App\Models\Model;

class PolisiDiyRecapitulationCategory extends Model
{
    protected static $logName = 'polisi_diy_rekapitulasi_category';

    protected $fillable = [
        'name',
    ];
}
