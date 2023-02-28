<?php

namespace App\Domains\Cluster5\Models\AnakAids;

use App\Models\Model;

class AnakAidsRecapitulationCategory extends Model
{
    protected static $logName = 'anak_aids_rekapitulasi_category';

    protected $fillable = [
        'name',
    ];
}
