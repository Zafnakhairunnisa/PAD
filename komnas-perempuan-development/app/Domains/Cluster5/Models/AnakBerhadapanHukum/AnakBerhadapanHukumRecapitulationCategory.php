<?php

namespace App\Domains\Cluster5\Models\AnakBerhadapanHukum;

use App\Models\Model;

class AnakBerhadapanHukumRecapitulationCategory extends Model
{
    protected static $logName = 'anak_berhadapan_hukum_rekapitulasi_category';

    protected $fillable = [
        'name',
    ];
}
