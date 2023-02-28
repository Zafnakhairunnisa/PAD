<?php

namespace App\Domains\Institutional\Models;

use App\Domains\Institutional\Models\Traits\Scope\ChildProtectionActivity\ChildProtectionActivityScope;
use App\Models\File;
use App\Models\Location;
use App\Models\Model;
use App\Models\Traits\Slug;
use Database\Factories\ChildProtectionActivity\ChildProtectionActivityFactory;
use Spatie\Sluggable\SlugOptions;

/**
 * App\Domains\Institutional\Models\ChildProtectionActivity
 *
 * @property int $id
 * @property string $company_name
 * @property int|null $source_of_fund_id
 * @property int|null $activity_type_id
 * @property string $activity_name
 * @property string $target
 * @property string $budget
 * @property string $year
 * @property int|null $location_id
 * @property string $slug
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Domains\Institutional\Models\ChildProtectionActivityType|null $activity_type
 * @property-read \App\Domains\Auth\Models\User|null $creator
 * @property-read \Illuminate\Database\Eloquent\Collection|File[] $documents
 * @property-read int|null $documents_count
 * @property-read \Illuminate\Database\Eloquent\Collection|File[] $images
 * @property-read int|null $images_count
 * @property-read Location|null $location
 * @property-read \App\Domains\Institutional\Models\ChildProtectionActivitySourceOfFunds|null $source_of_fund
 * @property-read \App\Domains\Auth\Models\User|null $updater
 * @method static \Illuminate\Database\Eloquent\Builder|Model createdBy($userId)
 * @method static \Database\Factories\ChildProtectionActivity\ChildProtectionActivityFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivity query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivity search($term)
 * @method static \Illuminate\Database\Eloquent\Builder|Model updatedBy($userId)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivity whereActivityName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivity whereActivityTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivity whereBudget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivity whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivity whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivity whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivity whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivity whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivity whereSourceOfFundId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivity whereTarget($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivity whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivity whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivity whereYear($value)
 * @mixin \Eloquent
 */
class ChildProtectionActivity extends Model
{
    use ChildProtectionActivityScope, Slug;

    protected static $logName = 'child_protection_activities';

    protected $fillable = [
        'company_name',
        'source_of_fund_id',
        'activity_name',
        'activity_type_id',
        'target',
        'budget',
        'year',
        'location_id',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('activity_name')
            ->saveSlugsTo('slug');
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return ChildProtectionActivityFactory::new();
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function source_of_fund()
    {
        return $this->belongsTo(ChildProtectionActivitySourceOfFunds::class, 'source_of_fund_id');
    }

    public function activity_type()
    {
        return $this->belongsTo(ChildProtectionActivityType::class, 'activity_type_id');
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
