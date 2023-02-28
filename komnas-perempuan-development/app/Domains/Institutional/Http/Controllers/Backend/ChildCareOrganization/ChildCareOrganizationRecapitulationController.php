<?php

namespace App\Domains\Institutional\Http\Controllers\Backend\ChildCareOrganization;

use App\Domains\Institutional\Http\Requests\Backend\ChildCareOrganization\Recapitulation\StoreChildCareOrganizationRecapitulationRequest;
use App\Domains\Institutional\Http\Requests\Backend\ChildCareOrganization\Recapitulation\UpdateChildCareOrganizationRecapitulationRequest;
use App\Domains\Institutional\Models\ChildCareOrganizationRecapitulation;
use App\Domains\Institutional\Services\ChildCareOrganization\ChildCareOrganizationRecapitulationService;

/**
 * Class ChildCareOrganizationRecapitulationController.
 */
class ChildCareOrganizationRecapitulationController
{
    /**
     * Route path
     */
    private $route = 'admin.institutional.child_care_organization.recapitulation';

    /**
     * Resource file
     */
    private $view = 'backend.institutional.child_care_organization.recapitulation';

    /**
     * @var ChildCareOrganizationRecapitulationService
     */
    protected $service;

    /**
     * ChildCareOrganizationRecapitulationController constructor.
     *
     * @param  ChildCareOrganizationRecapitulationService  $service
     */
    public function __construct(ChildCareOrganizationRecapitulationService $service)
    {
        $this->service = $service;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view($this->view.'.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view($this->view.'.create');
    }

    /**
     * @param  StoreChildCareOrganizationRecapitulationRequest  $request
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreChildCareOrganizationRecapitulationRequest $request)
    {
        $this->service->store($request->validated());

        return redirect()
            ->route($this->route.'.index')
            ->withFlashSuccess(__('Berhasil membuat rekapitulasi organisasi peduli anak.'));
    }

    /**
     * @param  ChildCareOrganizationRecapitulation  $recapitulation
     * @return mixed
     */
    public function edit(ChildCareOrganizationRecapitulation $recapitulation)
    {
        return view($this->view.'.edit', )
            ->with([
                'data' => $recapitulation,
            ]);
    }

    /**
     * @param  UpdateChildCareOrganizationRecapitulationRequest  $request
     * @param  ChildCareOrganizationRecapitulation  $recapitulation
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(
        UpdateChildCareOrganizationRecapitulationRequest $request,
        ChildCareOrganizationRecapitulation $recapitulation
    ) {
        $this->service->update($recapitulation, $request->validated());

        return redirect()
            ->route($this->route.'.index')
            ->withFlashSuccess(__('Berhasil mengubah rekapitulasi organisasi peduli anak.'));
    }

    /**
     * @param  ChildCareOrganizationRecapitulation  $recapitulation
     * @return mixed
     *
     * @throws \Exception
     */
    public function destroy(ChildCareOrganizationRecapitulation $recapitulation)
    {
        $this->service->destroy($recapitulation);

        return redirect()
                ->route($this->route.'.index')
                ->withFlashSuccess(__('Berhasil menghapus rekapitulasi rekapitulasi organisasi peduli anak.'));
    }
}
