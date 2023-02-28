<?php

namespace App\Domains\Cluster2\Models\FamilyConsultancy;

use App\Models\Model;
use Database\Factories\FamilyConsultancy\FamilyConsultancyCategoryFactory;

class FamilyConsultancyCategory extends Model
{
    protected static $logName = 'family_consultancy_category';

    protected $fillable = ['name'];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return FamilyConsultancyCategoryFactory::new();
    }

    public function location()
    {
        return $this->belongsTo(\App\Models\Location::class);
    }
}
