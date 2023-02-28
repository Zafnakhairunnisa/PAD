<?php

namespace App\Domains\Institutional\Models;

use App\Models\Location;
use App\Models\Model;
use Database\Factories\SatgasPPA\SatgasPPARecapitulationFactory;

class SatgasPPARecapitulation extends Model
{
    protected static $logName = 'satgas_ppa_recapitulation';

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
        return SatgasPPARecapitulationFactory::new();
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
