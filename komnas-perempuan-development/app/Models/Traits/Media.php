<?php

namespace App\Models\Traits;

use App\Models\File;

/**
 * Trait Slug.
 */
trait Media
{
    public function images()
    {
        return $this->morphMany(File::class, 'fileable')->where('category', 'images');
    }

    public function documents()
    {
        return $this->morphMany(File::class, 'fileable')->where('category', 'documents');
    }
}
