<?php

namespace App\Domains\Cluster3\Models\BreastFeeding;

use App\Domains\Cluster3\Models\BreastFeeding\Traits\Scope\BreastFeedingScope;
use App\Models\Model;
use Database\Factories\Cluster3\BreastFeedingFactory;

class BreastFeeding extends Model
{
    use BreastFeedingScope;

    protected static $logName = 'breast_feeding';

    protected $fillable = [
        'nama',
        'no_telepon',
        'lembaga',
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return BreastFeedingFactory::new();
    }
}
