<?php

namespace App\Domains\Cluster3\Models\Sanitation;

use App\Models\Model;
use Database\Factories\Cluster3\Sanitation\SanitationRecapitulationCategoryFactory;

class SanitationRecapitulationCategory extends Model
{
    protected static $logName = 'sanitation_recapitulation_category';

    protected $fillable = [
        'name',
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return SanitationRecapitulationCategoryFactory::new();
    }
}
