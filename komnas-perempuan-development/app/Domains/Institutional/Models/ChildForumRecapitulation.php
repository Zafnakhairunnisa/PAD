<?php

namespace App\Domains\Institutional\Models;

use App\Models\Location;
use App\Models\Model;
use Database\Factories\ChildForum\ChildForumRecapitulationFactory;

class ChildForumRecapitulation extends Model
{
    protected static $logName = 'child_forum_recapitulation';

    protected $fillable = [
        'year',
        'value_diy',
        'value_kabupaten',
        'value_kapanewon',
        'value_kalurahan',
        'location_id',
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return ChildForumRecapitulationFactory::new();
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
