<?php

namespace App\Domains\Institutional\Models;

use App\Domains\Institutional\Models\Traits\Scope\ChildProtectionIndex\ChildProtectionIndexScope;
use App\Models\Location;
use App\Models\Model;
use Database\Factories\ChildProtectionIndexFactory;

/**
 * App\Domains\Institutional\Models\ChildProtectionIndex
 *
 * @property int $id
 * @property string $category
 * @property string $year
 * @property string $value
 * @property string $rank
 * @property int|null $location_id
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Domains\Auth\Models\User|null $creator
 * @property-read Location|null $location
 * @property-read \App\Domains\Auth\Models\User|null $updater
 * @method static \Illuminate\Database\Eloquent\Builder|Model createdBy($userId)
 * @method static \Database\Factories\ChildProtectionIndexFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionIndex newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionIndex newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionIndex query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionIndex search($term)
 * @method static \Illuminate\Database\Eloquent\Builder|Model updatedBy($userId)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionIndex whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionIndex whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionIndex whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionIndex whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionIndex whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionIndex whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionIndex whereRank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionIndex whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionIndex whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionIndex whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionIndex whereYear($value)
 * @mixin \Eloquent
 */
class ChildProtectionIndex extends Model
{
    use ChildProtectionIndexScope;

    protected static $logName = 'child_protection_indices';

    protected $fillable = [
        'category',
        'year',
        'value',
        'rank',
        'location_id',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return ChildProtectionIndexFactory::new();
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
