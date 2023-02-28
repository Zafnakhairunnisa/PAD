<?php

namespace App\Domains\Institutional\Http\Controllers\Backend\ChildMedia;

use App\Domains\Institutional\Http\Requests\Backend\ChildMedia\Recapitulation\StoreChildMediaRecapitulationRequest;
use App\Domains\Institutional\Http\Requests\Backend\ChildMedia\Recapitulation\UpdateChildMediaRecapitulationRequest;
use App\Domains\Institutional\Models\ChildMediaRecapitulation;
use App\Domains\Institutional\Services\ChildMedia\ChildMediaRecapitulationService;

/**
 * Class ChildMediaRecapitulationController.
 */
class ChildMediaRecapitulationController
{
    /**
     * Route path
     */
    private $route = 'admin.institutional.child_media.recapitulation';

    /**
     * Resource file
     */
    private $view = 'backend.institutional.child_media.recapitulation';

    /**
     * @var ChildMediaRecapitulationService
     */
    protected $service;

    /**
     * ChildMediaRecapitulationController constructor.
     *
     * @param  ChildMediaRecapitulationService  $service
     */
    public function __construct(ChildMediaRecapitulationService $service)
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
     * @param  StoreChildMediaRecapitulationRequest  $request
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreChildMediaRecapitulationRequest $request)
    {
        $this->service->store($request->validated());

        return redirect()
            ->route($this->route.'.index')
            ->withFlashSuccess(__('Berhasil membuat rekapitulasi media massa sahabat anak.'));
    }

    /**
     * @param  ChildMediaRecapitulation  $recapitulation
     * @return mixed
     */
    public function edit(ChildMediaRecapitulation $recapitulation)
    {
        return view($this->view.'.edit', )
            ->with([
                'data' => $recapitulation,
            ]);
    }

    /**
     * @param  UpdateChildMediaRecapitulationRequest  $request
     * @param  ChildMediaRecapitulation  $recapitulation
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(
        UpdateChildMediaRecapitulationRequest $request,
        ChildMediaRecapitulation $recapitulation
    ) {
        $this->service->update($recapitulation, $request->validated());

        return redirect()
            ->route($this->route.'.index')
            ->withFlashSuccess(__('Berhasil mengubah rekapitulasi media massa sahabat anak.'));
    }

    /**
     * @param  ChildMediaRecapitulation  $recapitulation
     * @return mixed
     *
     * @throws \Exception
     */
    public function destroy(ChildMediaRecapitulation $recapitulation)
    {
        $this->service->destroy($recapitulation);

        return redirect()
                ->route($this->route.'.index')
                ->withFlashSuccess(__('Berhasil menghapus rekapitulasi rekapitulasi media massa sahabat anak.'));
    }
}
