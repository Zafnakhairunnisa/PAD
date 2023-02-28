<?php

namespace App\Domains\Cluster5\Models\PerlindunganKhususAnak;

use App\Domains\Cluster5\Models\PerlindunganKhususAnak\Traits\Scope\PerlindunganKhususAnakRecapitulationScope;
use App\Models\Model;

class PerlindunganKhususAnakRecapitulation extends Model
{
    use PerlindunganKhususAnakRecapitulationScope;

    protected static $logName = 'perlindungan_khusus_anak';

    protected $fillable = [
        'value',
        'year',
        'location_id',
        'category_id',
        'gender',
    ];

    public function location()
    {
        return $this->belongsTo(\App\Models\Location::class);
    }

    public function category()
    {
        return $this->belongsTo(PerlindunganKhususAnakRecapitulationCategory::class);
    }
}
