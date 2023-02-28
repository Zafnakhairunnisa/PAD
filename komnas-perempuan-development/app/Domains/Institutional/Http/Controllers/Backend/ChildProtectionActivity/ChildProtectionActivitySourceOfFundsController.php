<?php

namespace App\Domains\Institutional\Http\Controllers\Backend\ChildProtectionActivity;

use App\Domains\Institutional\Http\Requests\Backend\ChildProtectionActivity\StoreChildProtectionActivitySourceOfFundsRequest;
use App\Domains\Institutional\Http\Requests\Backend\ChildProtectionActivity\UpdateChildProtectionActivitySourceOfFundsRequest;
use App\Domains\Institutional\Models\ChildProtectionActivitySourceOfFunds;
use App\Domains\Institutional\Services\ChildProtectionActivitySourceOfFundsService;

/**
 * Class ChildProtectionActivitySourceOfFundsController.
 */
class ChildProtectionActivitySourceOfFundsController
{
    /**
     * @var ChildProtectionActivitySourceOfFundsService
     */
    protected $childProtectionActivitySourceOfFundsService;

    /**
     * ChildProtectionActivitySourceOfFunds constructor.
     *
     * @param  ChildProtectionActivitySourceOfFundsService  $childProtectionActivitySourceOfFundsService
     */
    public function __construct(ChildProtectionActivitySourceOfFundsService $childProtectionActivitySourceOfFundsService)
    {
        $this->childProtectionActivitySourceOfFundsService = $childProtectionActivitySourceOfFundsService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.institutional.child_protection_activity.source_of_funds.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.institutional.child_protection_activity.source_of_funds.create');
    }

    /**
     * @param  StoreChildProtectionActivitySourceOfFundsRequest  $request
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreChildProtectionActivitySourceOfFundsRequest $request)
    {
        $this->childProtectionActivitySourceOfFundsService->store($request->validated());

        return redirect()
            ->route('admin.institutional.child_protection_activity.source_of_funds.index')
            ->withFlashSuccess(__('Berhasil membuat sumber dana kegiatan perlindungan anak.'));
    }

    /**
     * @param  ChildProtectionActivitySourceOfFunds  $childProtectionActivityFunds
     * @return mixed
     */
    public function edit(ChildProtectionActivitySourceOfFunds $childProtectionActivityFunds)
    {
        return view('backend.institutional.child_protection_activity.source_of_funds.edit')
            ->with([
                'childProtectionActivitySourceOfFunds' => $childProtectionActivityFunds,
            ]);
    }

    /**
     * @param  UpdateChildProtectionActivitySourceOfFundsRequest  $request
     * @param  ChildProtectionActivitySourceOfFunds  $childProtectionActivityFunds
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(UpdateChildProtectionActivitySourceOfFundsRequest $request, ChildProtectionActivitySourceOfFunds $childProtectionActivityFunds)
    {
        $this->childProtectionActivitySourceOfFundsService->update($childProtectionActivityFunds, $request->validated());

        return redirect()
            ->route('admin.institutional.child_protection_activity.source_of_funds.index')
            ->withFlashSuccess(__('Berhasil memperbarui sumber dana kegiatan perlindungan anak.'));
    }

    /**
     * @param  ChildProtectionActivitySourceOfFunds  $childProtectionActivityFunds
     * @return mixed
     *
     * @throws \Exception
     */
    public function destroy(ChildProtectionActivitySourceOfFunds $childProtectionActivityFunds)
    {
        $this->childProtectionActivitySourceOfFundsService->destroy($childProtectionActivityFunds);

        return redirect()
            ->route('admin.institutional.child_protection_activity.source_of_funds.index')
            ->withFlashSuccess(__('Berhasil menghapus sumber dana kegiatan perlindungan anak.'));
    }
}
