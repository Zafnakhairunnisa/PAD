<?php

namespace App\Domains\Cluster1\Models;

use App\Domains\Cluster1\Models\Traits\Scope\ChildIdentityCard\ChildIdentityCardScope;
use App\Models\Model;
use Database\Factories\Cluster1\ChildIdentityCard\ChildIdentityCardFactory;

class ChildIdentityCard extends Model
{
    use ChildIdentityCardScope;

    protected static $logName = 'birth_certificate';

    protected $generateSlugFrom = 'nama';

    protected $fillable = [
        'category',
        'gender',
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
        return ChildIdentityCardFactory::new();
    }

    public function location()
    {
        return $this->belongsTo(\App\Models\Location::class);
    }
}
