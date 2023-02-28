<?php

namespace App\Domains\Institutional\Http\Controllers\Backend\SatgasPPA;

use App\Domains\Institutional\Http\Requests\Backend\SatgasPPA\Recapitulation\StoreSatgasPPARecapitulationRequest;
use App\Domains\Institutional\Http\Requests\Backend\SatgasPPA\Recapitulation\UpdateSatgasPPARecapitulationRequest;
use App\Domains\Institutional\Models\SatgasPPARecapitulation;
use App\Domains\Institutional\Services\SatgasPPA\SatgasPPARecapitulationService;

/**
 * Class SatgasPPARecapitulationController.
 */
class SatgasPPARecapitulationController
{
    /**
     * @var SatgasPPARecapitulationService
     */
    protected $service;

    /**
     * SatgasPPARecapitulationController constructor.
     *
     * @param  SatgasPPARecapitulationService  $service
     */
    public function __construct(SatgasPPARecapitulationService $service)
    {
        $this->service = $service;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.institutional.satgas_ppa.recapitulation.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.institutional.satgas_ppa.recapitulation.create');
    }

    /**
     * @param  StoreSatgasPPARecapitulationRequest  $request
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreSatgasPPARecapitulationRequest $request)
    {
        $this->service->store($request->validated());

        return redirect()
            ->route('admin.institutional.satgas_ppa.recapitulation.index')
            ->withFlashSuccess(__('Berhasil membuat rekapitulasi satgas ppa.'));
    }

    /**
     * @param  SatgasPPARecapitulation  $recapitulation
     * @return mixed
     */
    public function edit(SatgasPPARecapitulation $recapitulation)
    {
        return view('backend.institutional.satgas_ppa.recapitulation.edit', )
            ->with([
                'recapitulation' => $recapitulation,
            ]);
    }

    /**
     * @param  UpdateSatgasPPARecapitulationRequest  $request
     * @param  SatgasPPARecapitulation  $recapitulation
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(
        UpdateSatgasPPARecapitulationRequest $request,
        SatgasPPARecapitulation $recapitulation
    ) {
        $this->service->update($recapitulation, $request->validated());

        return redirect()
            ->route('admin.institutional.satgas_ppa.recapitulation.index')
            ->withFlashSuccess(__('Berhasil mengubah rekapitulasi satgas ppa.'));
    }

    /**
     * @param  SatgasPPARecapitulation  $recapitulation
     * @return mixed
     *
     * @throws \Exception
     */
    public function destroy(SatgasPPARecapitulation $recapitulation)
    {
        $this->service->destroy($recapitulation);

        return redirect()
                ->route('admin.institutional.satgas_ppa.recapitulation.index')
                ->withFlashSuccess(__('Berhasil menghapus rekapitulasi rekapitulasi satgas ppa.'));
    }
}
