<?php

namespace App\Domains\Institutional\Models\Kapanewon;

use App\Domains\Institutional\Models\Kapanewon\Traits\Scope\KapanewonRecapitulationScope;
use App\Models\Model;

class KapanewonRecapitulation extends Model
{
    use KapanewonRecapitulationScope;

    protected static $logName = 'kapanewon';

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
        return $this->belongsTo(KapanewonRecapitulationCategory::class);
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
