<?php

namespace App\Domains\Cluster2\Models\ChildWelfareInstitution;

use App\Domains\Cluster2\Models\ChildWelfareInstitution\Traits\Scope\ChildWelfareInstitutionScope;
use App\Models\File;
use App\Models\Model;
use Database\Factories\Cluster2\ChildWelfareInstitution\ChildWelfareInstitutionFactory;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class ChildWelfareInstitution extends Model
{
    use HasSlug, ChildWelfareInstitutionScope;

    protected static $logName = 'child_welfare_institution';

    protected $fillable = [
        'nama',
        'jenis_id',
        'tahun_berdiri',
        'legalitas',
        'akreditasi',
        'dusun',
        'kalurahan',
        'kapanewon',
        'location_id',
        'media_sosial',
        'nama_pimpinan',
        'no_telepon',
        'jumlah_anak_asuh',
        'fasilitas',
        'kegiatan',
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
        return ChildWelfareInstitutionFactory::new();
    }

    public function location()
    {
        return $this->belongsTo(\App\Models\Location::class);
    }

    public function category()
    {
        return $this->belongsTo(ChildWelfareInstitutionCategory::class, 'jenis_id');
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
