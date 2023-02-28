<?php

namespace App\Models\Traits;

use Spatie\Sluggable\HasSlug as PackageSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * Trait Slug.
 */
trait Slug
{
    use PackageSlug;

    protected $generateSlugFrom = 'name';

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
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
