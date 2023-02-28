<?php

namespace App\Domains\Institutional\Http\Controllers\Backend\ChildProtectionActivity;

use App\Domains\Institutional\Http\Requests\Backend\ChildProtectionActivity\Recapitulation\StoreChildProtectionActivityRecapitulationRequest;
use App\Domains\Institutional\Http\Requests\Backend\ChildProtectionActivity\Recapitulation\UpdateChildProtectionActivityRecapitulationRequest;
use App\Domains\Institutional\Models\ChildProtectionActivityRecapitulations;
use App\Domains\Institutional\Services\ChildProtectionActivityRecapitulationService;

/**
 * Class ChildProtectionActivityRecapitulationController.
 */
class ChildProtectionActivityRecapitulationController
{
    /**
     * @var ChildProtectionActivityRecapitulationService
     */
    protected $service;

    /**
     * ChildProtectionActivityRecapitulationController constructor.
     *
     * @param  ChildProtectionActivityRecapitulationService  $service
     */
    public function __construct(ChildProtectionActivityRecapitulationService $service)
    {
        $this->service = $service;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.institutional.child_protection_activity.recapitulation.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.institutional.child_protection_activity.recapitulation.create');
    }

    /**
     * @param  StoreChildProtectionActivityRecapitulationRequest  $request
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreChildProtectionActivityRecapitulationRequest $request)
    {
        $this->service->store($request->validated());

        return redirect()
            ->route('admin.institutional.child_protection_activity.recapitulation.index')
            ->withFlashSuccess(__('Berhasil membuat kegiatan perlindungan anak.'));
    }

    /**
     * @param  ChildProtectionActivityRecapitulations  $recapitulation
     * @return mixed
     */
    public function edit(ChildProtectionActivityRecapitulations $recapitulation)
    {
        return view('backend.institutional.child_protection_activity.recapitulation.edit', )
            ->with([
                'recapitulation' => $recapitulation,
            ]);
    }

    /**
     * @param  UpdateChildProtectionActivityRecapitulationRequest  $request
     * @param  ChildProtectionActivityRecapitulations  $recapitulation
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(
        UpdateChildProtectionActivityRecapitulationRequest $request,
        ChildProtectionActivityRecapitulations $recapitulation
    ) {
        $this->service->update($recapitulation, $request->validated());

        return redirect()
            ->route('admin.institutional.child_protection_activity.recapitulation.index')
            ->withFlashSuccess(__('Berhasil mengubah kegiatan perlindungan anak.'));
    }

    /**
     * @param  ChildProtectionActivityRecapitulations  $recapitulation
     * @return mixed
     *
     * @throws \Exception
     */
    public function destroy(ChildProtectionActivityRecapitulations $recapitulation)
    {
        $this->service->destroy($recapitulation);

        return redirect()
                ->route('admin.institutional.child_protection_activity.recapitulation.index')
                ->withFlashSuccess(__('Berhasil menghapus rekapitulasi kegiatan perlindungan anak.'));
    }
}
