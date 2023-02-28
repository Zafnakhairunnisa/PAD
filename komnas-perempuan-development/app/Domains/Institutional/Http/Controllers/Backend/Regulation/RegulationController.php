<?php

namespace App\Domains\Institutional\Http\Controllers\Backend\Regulation;

use App\Domains\Institutional\Models\Regulation;
use App\Domains\Institutional\Services\RegulationService;

/**
 * Class RegulationController.
 */
class RegulationController
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
        return view('backend.institutional.regulation.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.institutional.regulation.create');
    }

    /**
     * @param  Regulation  $regulation
     * @return mixed
     */
    public function edit(Regulation $regulation)
    {
        return view('backend.institutional.regulation.edit')
            ->with([
                'regulation' => $regulation,
            ]);
    }

    /**
     * @param  Regulation  $regulation
     * @return mixed
     *
     * @throws \Exception
     */
    public function destroy(Regulation $regulation)
    {
        $this->regulationService->destroy($regulation);

        return redirect()->route('admin.institutional.regulation.index')->withFlashSuccess(__('Berhasil menghapus peraturan dan kebijakan.'));
    }
}
