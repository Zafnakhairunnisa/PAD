<?php

namespace App\Domains\Institutional\Models\Traits\Scope\ChildProtectionActivity;

/**
 * Class ChildProtectionActivityScope.
 */
trait ChildProtectionActivityScope
{
    /**
     * @param $query
     * @param $term
     * @return mixed
     */
    public function scopeSearch($query, $term)
    {
        return $query->where('company_name', 'ILIKE', "%{$term}%")
                    ->orWhere('activity_name', 'ILIKE', "%{$term}%")
                    ->orWhere('type', 'ILIKE', "%{$term}%")
                    ->orWhere('target', 'ILIKE', "%{$term}%")
                    ->orWhere('budget', 'ILIKE', "%{$term}%");
    }
}
