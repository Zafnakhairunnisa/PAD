<?php

namespace App\Domains\Cluster5\Models\Kapanewon;

use App\Models\Model;

class KapanewonRecapitulationCategory extends Model
{
    protected static $logName = 'kapanewon_rekapitulasi_category';

    protected $fillable = [
        'name',
    ];
}
