<?php

namespace App\Domains\Cluster5\Models\Bprs;

use App\Domains\Cluster5\Models\Bprs\Traits\Scope\BprsRecapitulationScope;
use App\Models\Model;

class BprsRecapitulation extends Model
{
    use BprsRecapitulationScope;

    protected static $logName = 'bprs';

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
        return $this->belongsTo(BprsRecapitulationCategory::class);
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
