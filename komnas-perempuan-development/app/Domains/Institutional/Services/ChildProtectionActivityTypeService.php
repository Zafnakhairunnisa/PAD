<?php

namespace App\Domains\Institutional\Services;

use App\Domains\Institutional\Models\ChildProtectionActivityType;
use App\Services\BaseService;

/**
 * Class ChildProtectionActivityTypeService.
 */
class ChildProtectionActivityTypeService extends BaseService
{
    /**
     * ChildProtectionActivityService constructor.
     *
     * @param  ChildProtectionActivityType  $childProtectionActivityType
     */
    public function __construct(ChildProtectionActivityType $childProtectionActivityType)
    {
        $this->model = $childProtectionActivityType;
    }
}
