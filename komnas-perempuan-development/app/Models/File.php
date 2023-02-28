<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RichanFongdasen\EloquentBlameable\BlameableTrait;

/**
 * App\Models\File
 *
 * @property int $id
 * @property string $name
 * @property string $mime
 * @property string $size
 * @property string $path
 * @property string $category
 * @property int $fileable_id
 * @property string $fileable_type
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Domains\Auth\Models\User|null $creator
 * @property-read Model|\Eloquent $fileable
 * @property-read \App\Domains\Auth\Models\User|null $updater
 * @method static \Illuminate\Database\Eloquent\Builder|File createdBy($userId)
 * @method static \Illuminate\Database\Eloquent\Builder|File newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|File newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|File query()
 * @method static \Illuminate\Database\Eloquent\Builder|File updatedBy($userId)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereFileableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereFileableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereMime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class File extends Model
{
    use HasFactory, BlameableTrait;

    protected $fillable = ['name', 'mime', 'size', 'path', 'category', 'fillable_id', 'fillable_type'];

    public function fileable()
    {
        return $this->morphTo();
    }
}
