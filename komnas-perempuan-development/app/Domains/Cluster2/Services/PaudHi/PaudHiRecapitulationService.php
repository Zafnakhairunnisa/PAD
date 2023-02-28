<?php

namespace App\Domains\Cluster2\Services\PaudHi;

use App\Domains\Cluster2\Models\PaudHi\PaudHiRecapitulation;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class PaudHiRecapitulationService.
 */
class PaudHiRecapitulationService extends BaseService
{
    /**
     * PaudHiRecapitulationService constructor.
     *
     * @param  PaudHiRecapitulation  $recapitulation
     */
    public function __construct(PaudHiRecapitulation $recapitulation)
    {
        $this->model = $recapitulation;
    }

    /**
     * @param  array  $data
     * @return PaudHiRecapitulation
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): PaudHiRecapitulation
    {
        DB::beginTransaction();

        try {
            $recapitulation = $this->createPaudHiRecapitulation([
                'category_id' => $data['category_id'],
                'location_id' => $data['location_id'],
                'value' => $data['value'],
                'year' => $data['year'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat membuat rekapitulasi paud hi. Silahkan coba lagi.'));
        }

        DB::commit();

        return $recapitulation;
    }

    /**
     * @param  PaudHiRecapitulation  $recapitulation
     * @param  array  $data
     * @return PaudHiRecapitulation
     *
     * @throws \Throwable
     */
    public function update(PaudHiRecapitulation $recapitulation, array $data = []): PaudHiRecapitulation
    {
        DB::beginTransaction();

        try {
            $recapitulation->update([
                'category_id' => $data['category_id'],
                'location_id' => $data['location_id'],
                'value' => $data['value'],
                'year' => $data['year'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat memperbarui rekapitulasi paud hi. Silahkan coba lagi.'));
        }

        DB::commit();

        return $recapitulation;
    }

    /**
     * @param  PaudHiRecapitulation  $recapitulation
     * @return PaudHiRecapitulation
     *
     * @throws GeneralException
     */
    public function delete(PaudHiRecapitulation $recapitulation): PaudHiRecapitulation
    {
        if ($this->deleteById($recapitulation->id)) {
            return $recapitulation;
        }

        throw new GeneralException('Terjadi kesalahan saat menghapus rekapitulasi paud hi. Silahkan coba lagi.');
    }

    /**
     * @param  PaudHiRecapitulation  $recapitulation
     * @return PaudHiRecapitulation
     *
     * @throws GeneralException
     */
    public function restore(PaudHiRecapitulation $recapitulation): PaudHiRecapitulation
    {
        if ($recapitulation->restore()) {
            return $recapitulation;
        }

        throw new GeneralException(__('Terjadi kesalahan saat mengembalikan rekapitulasi paud hi. Silahkan coba lagi.'));
    }

    /**
     * @param  PaudHiRecapitulation  $recapitulation
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(PaudHiRecapitulation $recapitulation): bool
    {
        if ($recapitulation->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('Terjadi kesalahan saat menghapus secara permanan rekapitulasi paud hi. Silahkan coba lagi.'));
    }

    /**
     * @param  array  $data
     * @return PaudHiRecapitulation
     */
    protected function createPaudHiRecapitulation(array $data = []): PaudHiRecapitulation
    {
        return $this->model::create([
            'category_id' => $data['category_id'] ?? null,
            'location_id' => $data['location_id'] ?? null,
            'value' => $data['value'] ?? null,
            'year' => $data['year'] ?? null,
        ]);
    }
}
