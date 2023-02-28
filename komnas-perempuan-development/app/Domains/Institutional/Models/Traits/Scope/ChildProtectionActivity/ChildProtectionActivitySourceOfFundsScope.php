<?php

namespace App\Domains\Institutional\Models\Traits\Scope\ChildProtectionActivity;

/**
 * Class ChildProtectionActivitySourceOfFundsScope.
 */
trait ChildProtectionActivitySourceOfFundsScope
{
    /**
     * @param $query
     * @param $term
     * @return mixed
     */
    public function scopeSearch($query, $term)
    {
        return $query->where('name', 'ILIKE', "%{$term}%");
    }
}
