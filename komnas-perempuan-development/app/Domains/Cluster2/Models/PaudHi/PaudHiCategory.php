<?php

namespace App\Domains\Cluster2\Models\PaudHi;

use App\Models\Model;
use Database\Factories\Cluster2\PaudHi\PaudHiCategoryFactory;

class PaudHiCategory extends Model
{
    protected static $logName = 'paud_hi_category';

    protected $fillable = ['name'];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return PaudHiCategoryFactory::new();
    }

    public function location()
    {
        return $this->belongsTo(\App\Models\Location::class);
    }
}
