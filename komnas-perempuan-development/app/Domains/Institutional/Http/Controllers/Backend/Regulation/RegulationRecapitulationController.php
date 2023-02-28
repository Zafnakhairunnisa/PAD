<?php

namespace App\Domains\Institutional\Http\Controllers\Backend\Regulation;

use App\Domains\Institutional\Http\Requests\Backend\Regulation\Recapitulation\DeleteRegulationRecapitulationRequest;
use App\Domains\Institutional\Http\Requests\Backend\Regulation\Recapitulation\EditRegulationRecapitulationRequest;
use App\Domains\Institutional\Models\RegulationRecapitulation;
use App\Domains\Institutional\Services\RegulationRecapitulationService;

/**
 * Class RegulationRecapitulationController.
 */
class RegulationRecapitulationController
{
    /**
     * @var RegulationRecapitulationService
     */
    protected $service;

    /**
     * RegulationRecapitulationController constructor.
     *
     * @param  RegulationRecapitulationService  $service
     */
    public function __construct(RegulationRecapitulationService $service)
    {
        $this->service = $service;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.institutional.regulation.recapitulation.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.institutional.regulation.recapitulation.create');
    }

    /**
     * @param  EditRegulationRecapitulationRequest  $request
     * @param  RegulationRecapitulation  $recapitulation
     * @return mixed
     */
    public function edit(EditRegulationRecapitulationRequest $request, RegulationRecapitulation $recapitulation)
    {
        return view('backend.institutional.regulation.recapitulation.edit')
            ->with([
                'recapitulation' => $recapitulation,
            ]);
    }

    /**
     * @param  DeleteRegulationRecapitulationRequest  $request
     * @param  RegulationRecapitulation  $regulation
     * @return mixed
     *
     * @throws \Exception
     */
    public function destroy(DeleteRegulationRecapitulationRequest $request, RegulationRecapitulation $recapitulation)
    {
        $this->service->destroy($recapitulation);

        return redirect()
                ->route('admin.institutional.regulation.recapitulation.index')
                ->withFlashSuccess(__('Berhasil menghapus rekapitulasi peraturan dan kebijakan.'));
    }
}
