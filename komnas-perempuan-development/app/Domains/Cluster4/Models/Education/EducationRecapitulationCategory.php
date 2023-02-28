<?php

namespace App\Domains\Cluster4\Models\Education;

use App\Models\Model;
use Database\Factories\Cluster4\Education\EducationRecapitulationCategoryFactory;

class EducationRecapitulationCategory extends Model
{
    protected static $logName = 'child_birth';

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
        return EducationRecapitulationCategoryFactory::new();
    }
}
