<?php

namespace App\Domains\Cluster5\Models\AnakBerhadapanHukum;

use App\Domains\Cluster5\Models\AnakBerhadapanHukum\Traits\Scope\AnakBerhadapanHukumRecapitulationScope;
use App\Models\Model;

class AnakBerhadapanHukumRecapitulation extends Model
{
    use AnakBerhadapanHukumRecapitulationScope;

    protected static $logName = 'anak_berhadapan_hukum';

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
        return $this->belongsTo(AnakBerhadapanHukumRecapitulationCategory::class);
    }
}
