<?php

namespace App\Domains\Institutional\Services\ChildMedia;

use App\Domains\Institutional\Models\ChildMediaRecapitulation;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class ChildMediaRecapitulationService.
 */
class ChildMediaRecapitulationService extends BaseService
{
    /**
     * ChildMediaRecapitulationService constructor.
     *
     * @param  ChildMediaRecapitulation  $recapitulation
     */
    public function __construct(ChildMediaRecapitulation $recapitulation)
    {
        $this->model = $recapitulation;
    }

    /**
     * @param  array  $data
     * @return ChildMediaRecapitulation
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): ChildMediaRecapitulation
    {
        DB::beginTransaction();

        try {
            $recapitulation = $this->createChildProtectionActivity([
                'value' => $data['value'],
                'year' => $data['year'],
                'location_id' => $data['location_id'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat membuat rekapitulasi media massa sahabat anak. Silahkan coba lagi.'));
        }

        DB::commit();

        return $recapitulation;
    }

    /**
     * @param  ChildMediaRecapitulation  $recapitulation
     * @param  array  $data
     * @return ChildMediaRecapitulation
     *
     * @throws \Throwable
     */
    public function update(ChildMediaRecapitulation $recapitulation, array $data = []): ChildMediaRecapitulation
    {
        DB::beginTransaction();

        try {
            $recapitulation->update([
                'value' => $data['value'],
                'year' => $data['year'],
                'location_id' => $data['location_id'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat memperbarui rekapitulasi media massa sahabat anak. Silahkan coba lagi.'));
        }

        DB::commit();

        return $recapitulation;
    }

    /**
     * @param  ChildMediaRecapitulation  $recapitulation
     * @return ChildMediaRecapitulation
     *
     * @throws GeneralException
     */
    public function delete(ChildMediaRecapitulation $recapitulation): ChildMediaRecapitulation
    {
        if ($this->deleteById($recapitulation->id)) {
            return $recapitulation;
        }

        throw new GeneralException('Terjadi kesalahan saat menghapus rekapitulasi media massa sahabat anak. Silahkan coba lagi.');
    }

    /**
     * @param  ChildMediaRecapitulation  $recapitulation
     * @return ChildMediaRecapitulation
     *
     * @throws GeneralException
     */
    public function restore(ChildMediaRecapitulation $recapitulation): ChildMediaRecapitulation
    {
        if ($recapitulation->restore()) {
            return $recapitulation;
        }

        throw new GeneralException(__('Terjadi kesalahan saat mengembalikan rekapitulasi media massa sahabat anak. Silahkan coba lagi.'));
    }

    /**
     * @param  ChildMediaRecapitulation  $recapitulation
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(ChildMediaRecapitulation $recapitulation): bool
    {
        if ($recapitulation->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('Terjadi kesalahan saat menghapus secara permanen rekapitulasi media massa sahabat anak. Silahkan coba lagi.'));
    }

    /**
     * @param  array  $data
     * @return ChildMediaRecapitulation
     */
    protected function createChildProtectionActivity(array $data = []): ChildMediaRecapitulation
    {
        return $this->model::create([
            'value' => $data['value'] ?? null,
            'year' => $data['year'] ?? null,
            'location_id' => $data['location_id'] ?? null,
        ]);
    }
}
