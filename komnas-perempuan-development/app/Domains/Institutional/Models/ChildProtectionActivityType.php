<?php

namespace App\Domains\Institutional\Models;

use App\Models\Model;
use Database\Factories\ChildProtectionActivity\ChildProtectionActivityTypeFactory;

/**
 * App\Domains\Institutional\Models\ChildProtectionActivityType
 *
 * @property int $id
 * @property string $name
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Domains\Auth\Models\User|null $creator
 * @property-read \App\Domains\Auth\Models\User|null $updater
 * @method static \Illuminate\Database\Eloquent\Builder|Model createdBy($userId)
 * @method static \Database\Factories\ChildProtectionActivity\ChildProtectionActivityTypeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivityType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivityType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivityType query()
 * @method static \Illuminate\Database\Eloquent\Builder|Model updatedBy($userId)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivityType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivityType whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivityType whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivityType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivityType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivityType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivityType whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class ChildProtectionActivityType extends Model
{
    protected $fillable = ['name'];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return ChildProtectionActivityTypeFactory::new();
    }
}
