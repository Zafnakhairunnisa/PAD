<?php

namespace App\Domains\Institutional\Http\Controllers\Backend\ChildForum;

use App\Domains\Institutional\Http\Requests\Backend\ChildForum\StoreChildForumRequest;
use App\Domains\Institutional\Http\Requests\Backend\ChildForum\UpdateChildForumRequest;
use App\Domains\Institutional\Models\ChildForum;
use App\Domains\Institutional\Services\ChildForum\ChildForumService;

/**
 * Class ChildForumController.
 */
class ChildForumController
{
    /**
     * @var ChildForumService
     */
    protected $service;

    /**
     * ChildForumController constructor.
     *
     * @param  ChildForumService  $service
     */
    public function __construct(ChildForumService $service)
    {
        $this->service = $service;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.institutional.child_forum.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.institutional.child_forum.create');
    }

    /**
     * @param  StoreChildForumRequest  $request
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreChildForumRequest $request)
    {
        $this->service->store($request->validated());

        return redirect()
            ->route('admin.institutional.child_forum.index')
            ->withFlashSuccess(__('Berhasil membuat forum anak.'));
    }

    /**
     * @param  ChildForum  $childForum
     * @return mixed
     */
    public function edit(ChildForum $childForum)
    {
        $images = $childForum->images->map(function ($image) {
            return mapFilepondImages($image);
        });
        $documents = $childForum->documents->map(function ($image) {
            return mapFilepondImages($image);
        });

        return view('backend.institutional.child_forum.edit', )
            ->with([
                'childForum' => $childForum,
                'images' => $images,
                'documents' => $documents,
            ]);
    }

    /**
     * @param  UpdateChildForumRequest  $request
     * @param  ChildForum  $childForum
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(
        UpdateChildForumRequest $request,
        ChildForum $childForum
    ) {
        $this->service->update($childForum, $request->validated());

        return redirect()
            ->route('admin.institutional.child_forum.index')
            ->withFlashSuccess(__('Berhasil mengubah forum anak.'));
    }

    /**
     * @param  ChildForum  $childForum
     * @return mixed
     *
     * @throws \Exception
     */
    public function destroy(ChildForum $childForum)
    {
        $this->service->destroy($childForum);

        return redirect()
                ->route('admin.institutional.child_forum.index')
                ->withFlashSuccess(__('Berhasil menghapus rekapitulasi forum anak.'));
    }
}
