<?php

namespace App\Domains\Institutional\Models\Traits\Scope\ChildProtectionIndex;

/**
 * Class ChildProtectionIndexScope.
 */
trait ChildProtectionIndexScope
{
    /**
     * @param $query
     * @param $term
     * @return mixed
     */
    public function scopeSearch($query, $term)
    {
        return $query->where('category', 'ILIKE', "%{$term}%")
                    ->orWhere('year', 'ILIKE', "%{$term}%")
                    ->orWhereHas('location', function ($query) use ($term) {
                        $query->where('locations.name', 'ilike', '%'.$term.'%');
                    });
    }
}
