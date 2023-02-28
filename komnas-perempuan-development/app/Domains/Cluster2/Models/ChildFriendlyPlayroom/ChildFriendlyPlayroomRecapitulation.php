<?php

namespace App\Domains\Cluster2\Models\ChildFriendlyPlayroom;

use App\Domains\Cluster2\Models\ChildFriendlyPlayroom\Traits\Scope\ChildFriendlyPlayroomRecapitulationScope;
use App\Models\Model;
use Database\Factories\Cluster2\ChildFriendlyPlayroom\ChildFriendlyPlayroomRecapitulationFactory;

class ChildFriendlyPlayroomRecapitulation extends Model
{
    use ChildFriendlyPlayroomRecapitulationScope;

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
        return ChildFriendlyPlayroomRecapitulationFactory::new();
    }

    public function location()
    {
        return $this->belongsTo(\App\Models\Location::class);
    }

    public function category()
    {
        return $this->belongsTo(ChildFriendlyPlayroomCategory::class, 'category_id');
    }
}
