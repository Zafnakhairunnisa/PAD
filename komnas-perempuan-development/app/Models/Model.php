<?php

namespace App\Models;

use App\Models\Traits\ClearsResponseCache;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as BaseModel;
use RichanFongdasen\EloquentBlameable\BlameableTrait;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * App\Models\Model
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Activitylog\Models\Activity[] $activities
 * @property-read int|null $activities_count
 * @property-read \App\Domains\Auth\Models\User $creator
 * @property-read \App\Domains\Auth\Models\User $updater
 * @method static \Illuminate\Database\Eloquent\Builder|Model createdBy($userId)
 * @method static \Illuminate\Database\Eloquent\Builder|Model newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Model newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Model query()
 * @method static \Illuminate\Database\Eloquent\Builder|Model updatedBy($userId)
 * @mixin \Eloquent
 */
class Model extends BaseModel
{
    use HasFactory, LogsActivity, BlameableTrait, ClearsResponseCache;

    protected static $logFillable = true;

    protected static $logName = 'default';

    public function getDescriptionForEvent(string $eventName): string
    {
        return ":causer.name {$eventName} {$this::$logName} :subject.name";
    }
}
