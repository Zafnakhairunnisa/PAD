<?php

namespace App\Domains\Cluster5\Models\PerlindunganKhususAnak;

use App\Models\Model;

class PerlindunganKhususAnakRecapitulationCategory extends Model
{
    protected static $logName = 'perlindungan_khusus_anak_rekapitulasi_category';

    protected $fillable = [
        'name',
    ];
}
