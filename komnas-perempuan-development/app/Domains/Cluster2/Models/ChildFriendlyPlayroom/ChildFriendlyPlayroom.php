<?php

namespace App\Domains\Cluster2\Models\ChildFriendlyPlayroom;

use App\Domains\Cluster2\Models\ChildFriendlyPlayroom\Traits\Scope\ChildFriendlyPlayroomScope;
use App\Models\File;
use App\Models\Model;
use Database\Factories\Cluster2\ChildFriendlyPlayroom\ChildFriendlyPlayroomFactory;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class ChildFriendlyPlayroom extends Model
{
    use HasSlug, ChildFriendlyPlayroomScope;

    protected static $logName = 'child_friendly_playroom';

    protected $fillable = [
        'nama',
        'alamat',
        'kalurahan',
        'kapanewon',
        'location_id',
        'sertifikasi',
        'jenis',
        'fasilitas',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('nama')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return ChildFriendlyPlayroomFactory::new();
    }

    public function category()
    {
        return $this->belongsTo(ChildFriendlyPlayroomCategory::class, 'category_id');
    }

    public function location()
    {
        return $this->belongsTo(\App\Models\Location::class);
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
