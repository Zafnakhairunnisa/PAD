<?php

namespace App\Domains\Institutional\Models\Kelurahan;

use App\Models\Model;

class KelurahanRecapitulationCategory extends Model
{
    protected static $logName = 'kelurahan_rekapitulasi_category';

    protected $fillable = [
        'name',
    ];
}
