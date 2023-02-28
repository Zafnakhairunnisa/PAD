<?php

namespace App\Domains\Institutional\Models\Kelurahan;

use App\Domains\Institutional\Models\Kelurahan\Traits\Scope\KelurahanRecapitulationScope;
use App\Models\Model;

class KelurahanRecapitulation extends Model
{
    use KelurahanRecapitulationScope;

    protected static $logName = 'kelurahan';

    protected $fillable = [
        'value',
        'year',
        'location_id',
        'category_id',
    ];

    public function location()
    {
        return $this->belongsTo(\App\Models\Location::class);
    }

    public function category()
    {
        return $this->belongsTo(KelurahanRecapitulationCategory::class);
    }

    public function images()
    {
        return $this->morphMany(File::class, 'fileable')->where('category', 'images');
    }

    public function documents()
    {
        return $this->morphMany(File::class, 'fileable')->where('category', 'documents');
    }
}
