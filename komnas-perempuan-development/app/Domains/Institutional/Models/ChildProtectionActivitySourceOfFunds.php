<?php

namespace App\Domains\Institutional\Models;

use App\Domains\Institutional\Models\Traits\Scope\ChildProtectionActivity\ChildProtectionActivitySourceOfFundsScope;
use App\Models\Model;
use Database\Factories\ChildProtectionActivitySourceOfFundsFactory;

/**
 * App\Domains\Institutional\Models\ChildProtectionActivitySourceOfFunds
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
 * @method static \Database\Factories\ChildProtectionActivitySourceOfFundsFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivitySourceOfFunds newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivitySourceOfFunds newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivitySourceOfFunds query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivitySourceOfFunds search($term)
 * @method static \Illuminate\Database\Eloquent\Builder|Model updatedBy($userId)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivitySourceOfFunds whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivitySourceOfFunds whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivitySourceOfFunds whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivitySourceOfFunds whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivitySourceOfFunds whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivitySourceOfFunds whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChildProtectionActivitySourceOfFunds whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class ChildProtectionActivitySourceOfFunds extends Model
{
    use ChildProtectionActivitySourceOfFundsScope;

    protected $fillable = [
        'name',
    ];

    protected static $logName = 'child_protection_activity_source_of_funds';

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return ChildProtectionActivitySourceOfFundsFactory::new();
    }
}
