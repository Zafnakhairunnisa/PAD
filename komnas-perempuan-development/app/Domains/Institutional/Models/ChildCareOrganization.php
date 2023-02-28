<?php

namespace App\Domains\Institutional\Models;

use App\Domains\Institutional\Models\Traits\Scope\ChildCareOrganization\ChildCareOrganizationScope;
use App\Models\File;
use App\Models\Model;
use Database\Factories\ChildCareOrganization\ChildCareOrganizationFactory;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class ChildCareOrganization extends Model
{
    use HasSlug, ChildCareOrganizationScope;

    protected static $logName = 'child_care_organization';

    protected $generateSlugFrom = 'nama';

    protected $fillable = [
        'nama',
        'location_id',
        'alamat',
        'kalurahan',
        'kapanewon',
        'kabupaten',
        'media_sosial',
        'nomor_telepon',
        'nama_pimpinan',
        'kegiatan',
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
        return ChildCareOrganizationFactory::new();
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
