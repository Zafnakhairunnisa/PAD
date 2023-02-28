<?php

namespace App\Domains\Institutional\Http\Controllers\Backend\ChildProtectionActivity;

use App\Domains\Institutional\Models\ChildProtectionActivity;
use App\Domains\Institutional\Services\ChildProtectionActivityService;

class ChildProtectionActivityController
{
    /**
     * @var ChildProtectionActivityService
     */
    protected $childProtectionActivityService;

    /**
     * RegulationController constructor.
     *
     * @param  ChildProtectionActivityService  $childProtectionActivityService
     */
    public function __construct(ChildProtectionActivityService $childProtectionActivityService)
    {
        $this->childProtectionActivityService = $childProtectionActivityService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.institutional.child_protection_activity.index');
    }

    /**
     * @param  ChildProtectionActivity  $childProtectionActivity
     * @return mixed
     *
     * @throws \Exception
     */
    public function destroy(ChildProtectionActivity $childProtectionActivity)
    {
        $this->childProtectionActivityService->destroy($childProtectionActivity);

        return redirect()->route('admin.institutional.child_protection_activity.index')
            ->withFlashSuccess(__('Berhasil menghapus kegiatan perlindungan anak.'));
    }
}
