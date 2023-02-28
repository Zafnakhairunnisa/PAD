<?php

namespace App\Domains\Institutional\Models\Traits\Scope\ChildProtectionActivity;

/**
 * Class ChildProtectionActivityRecapitulationScope.
 */
trait ChildProtectionActivityRecapitulationScope
{
    /**
     * @param $query
     * @param $term
     * @return mixed
     */
    public function scopeSearch($query, $term)
    {
        return $query->where('company_count', 'ILIKE', "%{$term}%")
                    ->orWhere('source_of_fund_apbd', 'ILIKE', "%{$term}%")
                    ->orWhere('source_of_fund_csr', 'ILIKE', "%{$term}%")
                    ->orWhere('budget_amount', 'ILIKE', "%{$term}%")
                    ->orWhere('year', 'ILIKE', "%{$term}%")
                    ->orWhereHas('location', function ($query) use ($term) {
                        $query->where('locations.name', 'ilike', '%'.$term.'%');
                    });
    }
}
