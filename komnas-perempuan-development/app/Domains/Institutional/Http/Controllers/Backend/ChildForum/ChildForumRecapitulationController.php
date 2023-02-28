<?php

namespace App\Domains\Institutional\Http\Controllers\Backend\ChildForum;

use App\Domains\Institutional\Http\Requests\Backend\ChildForum\Recapitulation\StoreChildForumRecapitulationRequest;
use App\Domains\Institutional\Http\Requests\Backend\ChildForum\Recapitulation\UpdateChildForumRecapitulationRequest;
use App\Domains\Institutional\Models\ChildForumRecapitulation;
use App\Domains\Institutional\Services\ChildForum\ChildForumRecapitulationService;

/**
 * Class ChildForumRecapitulationController.
 */
class ChildForumRecapitulationController
{
    /**
     * Route path
     */
    private $route = 'admin.institutional.child_forum.recapitulation';

    /**
     * Resource file
     */
    private $view = 'backend.institutional.child_forum.recapitulation';

    /**
     * @var ChildForumRecapitulationService
     */
    protected $service;

    /**
     * ChildForumRecapitulationController constructor.
     *
     * @param  ChildForumRecapitulationService  $service
     */
    public function __construct(ChildForumRecapitulationService $service)
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
     * @param  StoreChildForumRecapitulationRequest  $request
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreChildForumRecapitulationRequest $request)
    {
        $this->service->store($request->validated());

        return redirect()
            ->route($this->route.'.index')
            ->withFlashSuccess(__('Berhasil membuat rekapitulasi satgas ppa.'));
    }

    /**
     * @param  ChildForumRecapitulation  $recapitulation
     * @return mixed
     */
    public function edit(ChildForumRecapitulation $recapitulation)
    {
        return view($this->view.'.edit', )
            ->with([
                'data' => $recapitulation,
            ]);
    }

    /**
     * @param  UpdateChildForumRecapitulationRequest  $request
     * @param  ChildForumRecapitulation  $recapitulation
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(
        UpdateChildForumRecapitulationRequest $request,
        ChildForumRecapitulation $recapitulation
    ) {
        $this->service->update($recapitulation, $request->validated());

        return redirect()
            ->route($this->route.'.index')
            ->withFlashSuccess(__('Berhasil mengubah rekapitulasi satgas ppa.'));
    }

    /**
     * @param  ChildForumRecapitulation  $recapitulation
     * @return mixed
     *
     * @throws \Exception
     */
    public function destroy(ChildForumRecapitulation $recapitulation)
    {
        $this->service->destroy($recapitulation);

        return redirect()
                ->route($this->route.'.index')
                ->withFlashSuccess(__('Berhasil menghapus rekapitulasi rekapitulasi satgas ppa.'));
    }
}
