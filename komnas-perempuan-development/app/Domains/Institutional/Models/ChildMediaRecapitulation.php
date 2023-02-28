<?php

namespace App\Domains\Institutional\Models;

use App\Domains\Institutional\Models\Traits\Scope\ChildMedia\ChildMediaRecapitulationScope;
use App\Models\Location;
use App\Models\Model;
use Database\Factories\ChildMedia\ChildMediaRecapitulationFactory;

class ChildMediaRecapitulation extends Model
{
    use ChildMediaRecapitulationScope;

    protected static $logName = 'child_media_recapitulation';

    protected $fillable = [
        'year',
        'value',
        'location_id',
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return ChildMediaRecapitulationFactory::new();
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
