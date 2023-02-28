<?php

namespace App\Domains\Cluster2\Models\ChildFriendlyPlayroom;

use App\Models\Model;
use Database\Factories\Cluster2\ChildFriendlyPlayroom\ChildFriendlyPlayroomCategoryFactory;

class ChildFriendlyPlayroomCategory extends Model
{
    protected static $logName = 'paud_hi_category';

    protected $fillable = ['name'];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return ChildFriendlyPlayroomCategoryFactory::new();
    }
}
