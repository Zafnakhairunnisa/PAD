<?php

namespace App\Domains\Institutional\Http\Controllers\Backend\ChildCareOrganization;

use App\Domains\Institutional\Http\Requests\Backend\ChildCareOrganization\StoreChildCareOrganizationRequest;
use App\Domains\Institutional\Http\Requests\Backend\ChildCareOrganization\UpdateChildCareOrganizationRequest;
use App\Domains\Institutional\Models\ChildCareOrganization;
use App\Domains\Institutional\Services\ChildCareOrganization\ChildCareOrganizationService;

/**
 * Class ChildCareOrganizationController.
 */
class ChildCareOrganizationController
{
    /**
     * Route path
     */
    private $route = 'admin.institutional.child_care_organization';

    /**
     * Resource file
     */
    private $view = 'backend.institutional.child_care_organization';

    /**
     * @var ChildCareOrganizationService
     */
    protected $service;

    /**
     * ChildCareOrganizationController constructor.
     *
     * @param  ChildCareOrganizationService  $service
     */
    public function __construct(ChildCareOrganizationService $service)
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
     * @param  StoreChildCareOrganizationRequest  $request
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreChildCareOrganizationRequest $request)
    {
        $this->service->store($request->validated());

        return redirect()
            ->route($this->route.'.index')
            ->withFlashSuccess(__('Berhasil membuat organisasi peduli anak.'));
    }

    /**
     * @param  ChildCareOrganization  $childCareOrganization
     * @return mixed
     */
    public function edit(ChildCareOrganization $childCareOrganization)
    {
        $images = $childCareOrganization->images->map(function ($image) {
            return mapFilepondImages($image);
        });
        $documents = $childCareOrganization->documents->map(function ($image) {
            return mapFilepondImages($image);
        });

        return view($this->view.'.edit', )
            ->with([
                'data' => $childCareOrganization,
                'images' => $images,
                'documents' => $documents,
            ]);
    }

    /**
     * @param  UpdateChildCareOrganizationRequest  $request
     * @param  ChildCareOrganization  $childCareOrganization
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(
        UpdateChildCareOrganizationRequest $request,
        ChildCareOrganization $childCareOrganization
    ) {
        $this->service->update($childCareOrganization, $request->validated());

        return redirect()
            ->route($this->route.'.index')
            ->withFlashSuccess(__('Berhasil mengubah organisasi peduli anak.'));
    }

    /**
     * @param  ChildCareOrganization  $childCareOrganization
     * @return mixed
     *
     * @throws \Exception
     */
    public function destroy(ChildCareOrganization $childCareOrganization)
    {
        $this->service->destroy($childCareOrganization);

        return redirect()
                ->route($this->route.'.index')
                ->withFlashSuccess(__('Berhasil menghapus organisasi peduli anak.'));
    }
}
