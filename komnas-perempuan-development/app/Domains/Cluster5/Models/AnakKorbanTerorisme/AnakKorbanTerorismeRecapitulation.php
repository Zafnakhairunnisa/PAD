<?php

namespace App\Domains\Cluster5\Models\AnakKorbanTerorisme;

use App\Domains\Cluster5\Models\AnakKorbanTerorisme\Traits\Scope\AnakKorbanTerorismeRecapitulationScope;
use App\Models\Model;

class AnakKorbanTerorismeRecapitulation extends Model
{
    use AnakKorbanTerorismeRecapitulationScope;

    protected static $logName = 'anak_korban_terorisme';

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
        return $this->belongsTo(AnakKorbanTerorismeRecapitulationCategory::class);
    }
}
