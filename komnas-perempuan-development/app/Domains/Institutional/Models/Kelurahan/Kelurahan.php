<?php

namespace App\Domains\Institutional\Models\Kelurahan;

use App\Domains\Institutional\Models\Kelurahan\Traits\Scope\KelurahanScope;
use App\Models\File;
use App\Models\Model;

class Kelurahan extends Model
{
    use KelurahanScope;

    protected static $logName = 'kelurahan';

    protected $fillable = [
        'kalurahan_kelurahan' ,
        'kapanewon' ,
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
