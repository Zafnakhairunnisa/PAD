<?php

namespace App\Domains\Cluster2\Models;

use App\Domains\Cluster2\Models\Traits\Scope\PerkawinanAnak\PerkawinanAnakScope;
use App\Models\Model;
use Database\Factories\Cluster2\PerkawinanAnak\PerkawinanAnakFactory;

class PerkawinanAnak extends Model
{
    use PerkawinanAnakScope;

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
        return PerkawinanAnakFactory::new();
    }

    public function location()
    {
        return $this->belongsTo(\App\Models\Location::class);
    }
}
