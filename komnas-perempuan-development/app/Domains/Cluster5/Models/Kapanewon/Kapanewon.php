<?php

namespace App\Domains\Cluster5\Models\Kapanewon;

use App\Domains\Cluster5\Models\Kapanewon\Traits\Scope\KapanewonScope;
use App\Models\File;
use App\Models\Model;

class Kapanewon extends Model
{
    use KapanewonScope;

    protected static $logName = 'kapanewon';

    protected $fillable = [
        'kapanewon_kemantren' ,
        'kabupaten' ,
        'tahun' ,
        'ketua_gugus' ,
        'no_gugus' ,
        'profil_anak' ,
        'forum_anak' ,
        'ruang_bermain' ,
        'pusat_informasi' ,
        'pusat_kreatifitas' ,
        'satgas_ppa' ,
        'patbm' ,
        'pikr' ,
        'kawasan_tanpa_rokok'
    ];

    public function images()
    {
        return $this->morphMany(File::class, 'fileable')->where('category', 'images');
    }

    public function documents()
    {
        return $this->morphMany(File::class, 'fileable')->where('category', 'documents');
    }
}
