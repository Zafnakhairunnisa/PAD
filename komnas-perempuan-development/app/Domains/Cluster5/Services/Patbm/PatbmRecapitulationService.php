<?php

namespace App\Domains\Cluster5\Services\Patbm;

use App\Domains\Cluster5\Models\Patbm\PatbmRecapitulation;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class PatbmRecapitulationService.
 */
class PatbmRecapitulationService extends BaseService
{
    /**
     * PatbmRecapitulationService constructor.
     *
     * @param  PatbmRecapitulation  $patbm
     */
    public function __construct(PatbmRecapitulation $patbm)
    {
        $this->model = $patbm;
    }

    /**
     * @param  array  $data
     * @return PatbmRecapitulation
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): PatbmRecapitulation
    {
        DB::beginTransaction();

        try {
            $patbm = $this->createPatbmRecapitulation([
                'value' => $data['value'],
                'year' => $data['year'],
                'location_id' => $data['location_id'],
                'category_id' => $data['category_id'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat membuat rekapitulasi persalinan di fasilitas kesehatan. Silahkan coba lagi.'));
        }

        DB::commit();

        return $patbm;
    }

    /**
     * @param  PatbmRecapitulation  $patbm
     * @param  array  $data
     * @return PatbmRecapitulation
     *
     * @throws \Throwable
     */
    public function update(PatbmRecapitulation $patbm, array $data = []): PatbmRecapitulation
    {
        DB::beginTransaction();

        try {
            $patbm->update([
                'value' => $data['value'],
                'year' => $data['year'],
                'location_id' => $data['location_id'],
                'category_id' => $data['category_id'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat memperbarui rekapitulasi persalinan di fasilitas kesehatan. Silahkan coba lagi.'));
        }

        DB::commit();

        return $patbm;
    }

    /**
     * @param  PatbmRecapitulation  $patbm
     * @return PatbmRecapitulation
     *
     * @throws GeneralException
     */
    public function delete(PatbmRecapitulation $patbm): PatbmRecapitulation
    {
        if ($this->deleteById($patbm->id)) {
            return $patbm;
        }

        throw new GeneralException('Terjadi kesalahan saat menghapus rekapitulasi persalinan di fasilitas kesehatan. Silahkan coba lagi.');
    }

    /**
     * @param  PatbmRecapitulation  $patbm
     * @return PatbmRecapitulation
     *
     * @throws GeneralException
     */
    public function restore(PatbmRecapitulation $patbm): PatbmRecapitulation
    {
        if ($patbm->restore()) {
            return $patbm;
        }

        throw new GeneralException(__('Terjadi kesalahan saat mengembalikan rekapitulasi persalinan di fasilitas kesehatan. Silahkan coba lagi.'));
    }

    /**
     * @param  PatbmRecapitulation  $patbm
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(PatbmRecapitulation $patbm): bool
    {
        if ($patbm->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('Terjadi kesalahan saat menghapus secara permanan rekapitulasi persalinan di fasilitas kesehatan. Silahkan coba lagi.'));
    }

    /**
     * @param  array  $data
     * @return PatbmRecapitulation
     */
    protected function createPatbmRecapitulation(array $data = []): PatbmRecapitulation
    {
        return $this->model::create([
            'value' => $data['value'],
            'year' => $data['year'],
            'location_id' => $data['location_id'],
            'category_id' => $data['category_id'],
        ]);
    }
}
