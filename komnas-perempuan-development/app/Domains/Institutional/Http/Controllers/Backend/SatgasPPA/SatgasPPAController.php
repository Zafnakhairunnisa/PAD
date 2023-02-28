<?php

namespace App\Domains\Institutional\Http\Controllers\Backend\SatgasPPA;

use App\Domains\Institutional\Http\Requests\Backend\SatgasPPA\StoreSatgasPPARequest;
use App\Domains\Institutional\Http\Requests\Backend\SatgasPPA\UpdateSatgasPPARequest;
use App\Domains\Institutional\Models\SatgasPPA;
use App\Domains\Institutional\Services\SatgasPPA\SatgasPPAService;

/**
 * Class SatgasPPAController.
 */
class SatgasPPAController
{
    /**
     * @var SatgasPPAService
     */
    protected $service;

    /**
     * SatgasPPAController constructor.
     *
     * @param  SatgasPPAService  $service
     */
    public function __construct(SatgasPPAService $service)
    {
        $this->service = $service;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.institutional.satgas_ppa.index');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return view('backend.institutional.satgas_ppa.create');
    }

    /**
     * @param  StoreSatgasPPARequest  $request
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(StoreSatgasPPARequest $request)
    {
        $this->service->store($request->validated());

        return redirect()
            ->route('admin.institutional.satgas_ppa.index')
            ->withFlashSuccess(__('Berhasil membuat satgas ppa.'));
    }

    /**
     * @param  SatgasPPA  $satgas
     * @return mixed
     */
    public function edit(SatgasPPA $satgas)
    {
        $images = $satgas->images->map(function ($image) {
            return mapFilepondImages($image);
        });
        $documents = $satgas->documents->map(function ($image) {
            return mapFilepondImages($image);
        });

        return view('backend.institutional.satgas_ppa.edit', )
            ->with([
                'satgas' => $satgas,
                'images' => $images,
                'documents' => $documents,
            ]);
    }

    /**
     * @param  UpdateSatgasPPARequest  $request
     * @param  SatgasPPA  $satgas
     * @return mixed
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(
        UpdateSatgasPPARequest $request,
        SatgasPPA $satgas
    ) {
        $this->service->update($satgas, $request->validated());

        return redirect()
            ->route('admin.institutional.satgas_ppa.index')
            ->withFlashSuccess(__('Berhasil mengubah satgas ppa.'));
    }

    /**
     * @param  SatgasPPA  $satgas
     * @return mixed
     *
     * @throws \Exception
     */
    public function destroy(SatgasPPA $satgas)
    {
        $this->service->destroy($satgas);

        return redirect()
                ->route('admin.institutional.satgas_ppa.index')
                ->withFlashSuccess(__('Berhasil menghapus rekapitulasi satgas ppa.'));
    }
}
