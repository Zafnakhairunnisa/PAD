<?php

namespace App\Domains\Institutional\Models;

use App\Domains\Institutional\Models\Traits\Scope\RegulationScope;
use App\Models\File;
use App\Models\Location;
use App\Models\Model;
use App\Models\Traits\Slug;
use Database\Factories\RegulationFactory;

/**
 * App\Domains\Institutional\Models\Regulation
 *
 * @property int $id
 * @property string $name
 * @property string $year
 * @property string $rule_type
 * @property string $type
 * @property int|null $location_id
 * @property string $slug
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Domains\Auth\Models\User|null $creator
 * @property-read \Illuminate\Database\Eloquent\Collection|File[] $documents
 * @property-read int|null $documents_count
 * @property-read \Illuminate\Database\Eloquent\Collection|File[] $images
 * @property-read int|null $images_count
 * @property-read Location|null $location
 * @property-read \App\Domains\Auth\Models\User|null $updater
 * @method static \Illuminate\Database\Eloquent\Builder|Model createdBy($userId)
 * @method static \Database\Factories\RegulationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Regulation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Regulation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Regulation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Regulation search($term)
 * @method static \Illuminate\Database\Eloquent\Builder|Model updatedBy($userId)
 * @method static \Illuminate\Database\Eloquent\Builder|Regulation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Regulation whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Regulation whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Regulation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Regulation whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Regulation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Regulation whereRuleType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Regulation whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Regulation whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Regulation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Regulation whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Regulation whereYear($value)
 * @mixin \Eloquent
 */
class Regulation extends Model
{
    use RegulationScope, Slug;

    protected static $logName = 'regulation';

    protected $generateSlugFrom = 'name';

    protected $fillable = ['name', 'year', 'rule_type', 'type', 'document', 'location_id', 'slug'];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return RegulationFactory::new();
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
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
