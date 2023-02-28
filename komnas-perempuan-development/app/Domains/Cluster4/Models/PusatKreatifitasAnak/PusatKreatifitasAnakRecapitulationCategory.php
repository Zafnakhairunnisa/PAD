<?php

namespace App\Domains\Cluster4\Models\PusatKreatifitasAnak;

use App\Models\Model;
use Database\Factories\Cluster4\PusatKreatifitasAnak\PusatKreatifitasAnakRecapitulationCategoryFactory;

class PusatKreatifitasAnakRecapitulationCategory extends Model
{
    protected static $logName = 'pusat_kreatifitas_anak_rekapitulasi_category';

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
        return PusatKreatifitasAnakRecapitulationCategoryFactory::new();
    }
}
