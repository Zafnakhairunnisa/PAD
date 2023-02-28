<?php

namespace App\Domains\Institutional\Models;

use App\Domains\Institutional\Models\Traits\Scope\SatgasPPA\SatgasPPAScope;
use App\Models\File;
use App\Models\Model;
use App\Models\Traits\Slug;
use Database\Factories\SatgasPPA\SatgasPPAFactory;

class SatgasPPA extends Model
{
    use Slug, SatgasPPAScope;

    protected static $logName = 'satgas_ppa';

    protected $generateSlugFrom = 'name';

    protected $fillable = [
        'name',
        'phone',
        'level',
        'kelurahan',
        'kemantren',
        'kabupaten',
        'nomor',
        'slug',
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return SatgasPPAFactory::new();
    }

    public function images()
    {
        return $this->morphMany(File::class, 'fileable')->where('category', 'images');
    }

    public function documents()
    {
        return $this->morphMany(File::class, 'fileable')->where('category', 'documents');
    }
}
