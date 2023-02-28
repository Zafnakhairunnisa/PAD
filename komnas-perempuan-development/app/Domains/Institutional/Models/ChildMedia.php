<?php

namespace App\Domains\Institutional\Models;

use App\Domains\Institutional\Models\Traits\Scope\ChildMedia\ChildMediaScope;
use App\Models\File;
use App\Models\Model;
use Database\Factories\ChildMedia\ChildMediaFactory;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class ChildMedia extends Model
{
    use HasSlug, ChildMediaScope;

    protected static $logName = 'child_media';

    protected $generateSlugFrom = 'nama';

    protected $fillable = [
        'nama',
        'jenis_media_id',
        'alamat',
        'kalurahan',
        'kapanewon',
        'kabupaten',
        'media_sosial',
        'nomor_telepon',
        'nama_pimpinan',
        'nama_acara',
        'slug',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom($this->generateSlugFrom)
            ->saveSlugsTo('slug');
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return ChildMediaFactory::new();
    }

    public function mediaType()
    {
        return $this->belongsTo(\App\Models\MediaType::class, 'jenis_media_id');
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
