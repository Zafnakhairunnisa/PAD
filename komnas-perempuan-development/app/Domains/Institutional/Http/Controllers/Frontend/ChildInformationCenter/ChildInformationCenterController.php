<?php

namespace App\Domains\Institutional\Http\Controllers\Frontend\ChildInformationCenter;

/**
 * Class ChildInformationCenterController.
 */
class ChildInformationCenterController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return inertia('Cluster1/ChildInformationCenter');
    }
}
