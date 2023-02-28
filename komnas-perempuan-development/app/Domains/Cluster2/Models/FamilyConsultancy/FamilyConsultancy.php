<?php

namespace App\Domains\Cluster2\Models\FamilyConsultancy;

use App\Domains\Cluster2\Models\FamilyConsultancy\Traits\Scope\FamilyConsultancyScope;
use App\Models\File;
use App\Models\Model;
use Database\Factories\Cluster2\FamilyConsultancy\FamilyConsultancyFactory;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class FamilyConsultancy extends Model
{
    use HasSlug, FamilyConsultancyScope;

    protected static $logName = 'family_consultancies';

    protected $fillable = [
        'nama',
        'kategori_id',
        'alamat',
        'kalurahan',
        'kapanewon',
        'location_id',
        'media_sosial',
        'nama_pimpinan',
        'no_telepon',
        'no_sertifikasi',
        'kegiatan',
        'klien',
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
        return FamilyConsultancyFactory::new();
    }

    public function location()
    {
        return $this->belongsTo(\App\Models\Location::class);
    }

    public function category()
    {
        return $this->belongsTo(FamilyConsultancyCategory::class, 'kategori_id');
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
