<?php

namespace App\Domains\Cluster5\Models\Lpka;

use App\Models\Model;

class LpkaRecapitulationCategory extends Model
{
    protected static $logName = 'lpka_rekapitulasi_category';

    protected $fillable = [
        'name',
    ];
}
