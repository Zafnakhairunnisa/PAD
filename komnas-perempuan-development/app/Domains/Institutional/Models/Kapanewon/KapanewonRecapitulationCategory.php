<?php

namespace App\Domains\Institutional\Models\Kapanewon;

use App\Models\Model;

class KapanewonRecapitulationCategory extends Model
{
    protected static $logName = 'kapanewon_rekapitulasi_category';

    protected $fillable = [
        'name',
    ];
}
