<?php

namespace App\Domains\Institutional\Models;

use App\Domains\Institutional\Models\Traits\Scope\ChildForum\ChildForumScope;
use App\Models\File;
use App\Models\Model;
use Database\Factories\ChildForum\ChildForumFactory;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class ChildForum extends Model
{
    use HasSlug, ChildForumScope;

    protected static $logName = 'child_forum';

    protected $generateSlugFrom = 'nama';

    protected $fillable = [
        'nama',
        'tingkat',
        'surat_keputusan',
        'waktu_pembentukan',
        'nama_ketua',
        'nomor_telepon',
        'alamat',
        'kalurahan',
        'kapanewon',
        'kabupaten',
        'media_sosial',
        'pelatihan_kha',
        'partisipasi_musrenbang',
        'kegiatan',
        'prestasi',
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
        return ChildForumFactory::new();
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
