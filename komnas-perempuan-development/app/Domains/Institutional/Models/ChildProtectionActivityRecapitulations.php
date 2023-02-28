<?php

namespace App\Domains\Institutional\Models;

use App\Domains\Institutional\Models\Traits\Scope\ChildProtectionActivity\ChildProtectionActivityRecapitulationScope;
use App\Models\Location;
use App\Models\Model;
use Database\Factories\ChildProtectionActivity\ChildProtectionActivityRecapitulationsFactory;

class ChildProtectionActivityRecapitulations extends Model
{
    use ChildProtectionActivityRecapitulationScope;

    protected static $logName = 'child_protection_activity_recapitulations';

    protected $fillable = [
        'company_count',
        'source_of_fund_apbd',
        'source_of_fund_csr',
        'budget_amount',
        'year',
        'location_id',
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return ChildProtectionActivityRecapitulationsFactory::new();
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function setSourceOfFundApbdAttribute($value)
    {
        $this->attributes['source_of_fund_apbd'] = removeFormatCurrency($value);
    }

    public function setSourceOfFundCsrAttribute($value)
    {
        $this->attributes['source_of_fund_csr'] = removeFormatCurrency($value);
    }

    public function setBudgetAmountAttribute($value)
    {
        $this->attributes['budget_amount'] = removeFormatCurrency($value);
    }
}
