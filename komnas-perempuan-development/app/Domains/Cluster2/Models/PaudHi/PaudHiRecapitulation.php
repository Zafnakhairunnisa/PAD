<?php

namespace App\Domains\Cluster2\Models\PaudHi;

use App\Domains\Cluster2\Models\PaudHi\Traits\Scope\PaudHiRecapitulationScope;
use App\Models\Model;
use Database\Factories\Cluster2\PaudHi\PaudHiRecapitulationFactory;

class PaudHiRecapitulation extends Model
{
    use PaudHiRecapitulationScope;

    protected static $logName = 'paud_hi_recapitulation';

    protected $fillable = [
        'category_id',
        'value',
        'year',
        'location_id',
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return PaudHiRecapitulationFactory::new();
    }

    public function location()
    {
        return $this->belongsTo(\App\Models\Location::class);
    }

    public function category()
    {
        return $this->belongsTo(PaudHiCategory::class, 'category_id');
    }
}
