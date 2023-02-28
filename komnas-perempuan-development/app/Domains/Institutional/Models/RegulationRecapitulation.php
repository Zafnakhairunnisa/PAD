<?php

namespace App\Domains\Institutional\Models;

use App\Domains\Institutional\Models\Traits\Scope\RegulationRecapitulationScope;
use App\Models\Location;
use App\Models\Model;
use Database\Factories\RegulationRecapitulationFactory;

/**
 * App\Domains\Institutional\Models\RegulationRecapitulation
 *
 * @property int $id
 * @property string $year
 * @property string $category
 * @property string $value
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
 * @method static \Database\Factories\RegulationRecapitulationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|RegulationRecapitulation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RegulationRecapitulation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RegulationRecapitulation query()
 * @method static \Illuminate\Database\Eloquent\Builder|RegulationRecapitulation search($term)
 * @method static \Illuminate\Database\Eloquent\Builder|Model updatedBy($userId)
 * @method static \Illuminate\Database\Eloquent\Builder|RegulationRecapitulation whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegulationRecapitulation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegulationRecapitulation whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegulationRecapitulation whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegulationRecapitulation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegulationRecapitulation whereLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegulationRecapitulation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegulationRecapitulation whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegulationRecapitulation whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RegulationRecapitulation whereYear($value)
 * @mixin \Eloquent
 */
class RegulationRecapitulation extends Model
{
    use RegulationRecapitulationScope;

    protected static $logName = 'regulation_recapitulation';

    protected $fillable = ['year', 'category', 'location_id', 'value'];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return RegulationRecapitulationFactory::new();
    }

    /**
     * Define an inverse one-to-one or many relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
