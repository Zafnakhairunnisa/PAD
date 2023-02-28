<?php

namespace App\Domains\Institutional\Http\Controllers\Backend\ChildProtectionIndex;

use App\Domains\Institutional\Models\ChildProtectionIndex;
use App\Domains\Institutional\Services\ChildProtectionIndexService;

/**
 * Class ChildProtectionIndexController.
 */
class ChildProtectionIndexController
{
    /**
     * @var ChildProtectionIndexService
     */
    protected $childProtectionIndexService;

    /**
     * ChildProtectionIndex constructor.
     *
     * @param  ChildProtectionIndexService  $childProtectionIndexService
     */
    public function __construct(ChildProtectionIndexService $childProtectionIndexService)
    {
        $this->childProtectionIndexService = $childProtectionIndexService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.institutional.child_protection_index.index');
    }

    /**
     * @param  ChildProtectionIndex  $childProtectionIndex
     * @return mixed
     *
     * @throws \Exception
     */
    public function destroy(ChildProtectionIndex $childProtectionIndex)
    {
        $this->childProtectionIndexService->destroy($childProtectionIndex);

        return redirect()->route('admin.institutional.child_protection_index.index')->withFlashSuccess(__('Berhasil menghapus indeks perlindungan anak.'));
    }
}
