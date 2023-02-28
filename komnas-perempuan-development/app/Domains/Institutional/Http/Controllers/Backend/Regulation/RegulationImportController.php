<?php

namespace App\Domains\Institutional\Http\Controllers\Backend\Regulation;

use App\Domains\Institutional\Services\RegulationService;

/**
 * Class RegulationImportController.
 */
class RegulationImportController
{
    /**
     * @var RegulationService
     */
    protected $regulationService;

    /**
     * RegulationController constructor.
     *
     * @param  RegulationService  $regulationService
     */
    public function __construct(RegulationService $regulationService)
    {
        $this->regulationService = $regulationService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.institutional.regulation.import');
    }
}
