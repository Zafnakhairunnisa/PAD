<?php

namespace App\Domains\Institutional\Http\Controllers\Backend\ChildMedia;

use App\Domains\Institutional\Http\Requests\Backend\ChildMedia\StoreChildMediaRequest;
use App\Domains\Institutional\Http\Requests\Backend\ChildMedia\UpdateChildMediaRequest;
use App\Domains\Institutional\Models\ChildMedia;
use App\Domains\Institutional\Services\ChildMedia\ChildMediaService;

/**
 * Class ChildMediaController.
 */
class ChildMediaController
{
    /**
     * Route path
     */
    private $route = 'admin.institutional.child_media';

    /**
     * Resource file
     */
    private $view = 'backend.institutional.child_media';

    /**
     * @var ChildMediaService
     */
    protected $service;

    /**
     * ChildMediaController constructor.
     *
     * @param  ChildMediaService  $service
     */
    public function __construct(ChildMediaService $service)
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
     * @param  StoreChildMediaRequest  $request
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreChildMediaRequest $request)
    {
        $this->service->store($request->validated());

        return redirect()
            ->route($this->route.'.index')
            ->withFlashSuccess(__('Berhasil membuat media massa sahabat anak.'));
    }

    /**
     * @param  ChildMedia  $childMedia
     * @return mixed
     */
    public function edit(ChildMedia $childMedia)
    {
        $images = $childMedia->images->map(function ($image) {
            return mapFilepondImages($image);
        });
        $documents = $childMedia->documents->map(function ($image) {
            return mapFilepondImages($image);
        });

        return view($this->view.'.edit', )
            ->with([
                'data' => $childMedia,
                'images' => $images,
                'documents' => $documents,
            ]);
    }

    /**
     * @param  UpdateChildMediaRequest  $request
     * @param  ChildMedia  $childMedia
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(
        UpdateChildMediaRequest $request,
        ChildMedia $childMedia
    ) {
        $this->service->update($childMedia, $request->validated());

        return redirect()
            ->route($this->route.'.index')
            ->withFlashSuccess(__('Berhasil mengubah media massa sahabat anak.'));
    }

    /**
     * @param  ChildMedia  $childMedia
     * @return mixed
     *
     * @throws \Exception
     */
    public function destroy(ChildMedia $childMedia)
    {
        $this->service->destroy($childMedia);

        return redirect()
                ->route($this->route.'.index')
                ->withFlashSuccess(__('Berhasil menghapus media massa sahabat anak.'));
    }
}
