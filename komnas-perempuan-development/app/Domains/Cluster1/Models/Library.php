<?php

namespace App\Domains\Cluster1\Models;

use App\Models\Model;
use App\Domains\Cluster1\Models\Traits\Scope\Library\LibraryScope;

class Library extends Model
{
    use LibraryScope;

    protected $table = 'perpustakaan_dan_taman_bacaan';
    protected static $logName = 'perpustakaan_dan_taman_bacaan';

    protected $generateSlugFrom = 'nama';

    protected $fillable = [
        'name',
        'value',
        'year',
        'parent_id'
    ];

    public function parent()
    {
        return $this->belongsTo(Library::class, 'parent_id');
    }
}
