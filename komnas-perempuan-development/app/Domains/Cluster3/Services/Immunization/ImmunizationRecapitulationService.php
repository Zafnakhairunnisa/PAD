<?php

namespace App\Domains\Cluster3\Services\Immunization;

use App\Domains\Cluster3\Models\Immunization\ImmunizationRecapitulation;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class ImmunizationRecapitulationService.
 */
class ImmunizationRecapitulationService extends BaseService
{
    /**
     * ImmunizationRecapitulationService constructor.
     *
     * @param  ImmunizationRecapitulation  $immunization
     */
    public function __construct(ImmunizationRecapitulation $immunization)
    {
        $this->model = $immunization;
    }

    /**
     * @param  array  $data
     * @return ImmunizationRecapitulation
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): ImmunizationRecapitulation
    {
        DB::beginTransaction();

        try {
            $immunization = $this->createImmunizationRecapitulation([
                'value' => $data['value'],
                'year' => $data['year'],
                'location_id' => $data['location_id'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat membuat rekapitulasi cakupan imunisasi dasar lengkap. Silahkan coba lagi.'));
        }

        DB::commit();

        return $immunization;
    }

    /**
     * @param  ImmunizationRecapitulation  $immunization
     * @param  array  $data
     * @return ImmunizationRecapitulation
     *
     * @throws \Throwable
     */
    public function update(ImmunizationRecapitulation $immunization, array $data = []): ImmunizationRecapitulation
    {
        DB::beginTransaction();

        try {
            $immunization->update([
                'value' => $data['value'],
                'year' => $data['year'],
                'location_id' => $data['location_id'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat memperbarui rekapitulasi cakupan imunisasi dasar lengkap. Silahkan coba lagi.'));
        }

        DB::commit();

        return $immunization;
    }

    /**
     * @param  ImmunizationRecapitulation  $immunization
     * @return ImmunizationRecapitulation
     *
     * @throws GeneralException
     */
    public function delete(ImmunizationRecapitulation $immunization): ImmunizationRecapitulation
    {
        if ($this->deleteById($immunization->id)) {
            return $immunization;
        }

        throw new GeneralException('Terjadi kesalahan saat menghapus rekapitulasi cakupan imunisasi dasar lengkap. Silahkan coba lagi.');
    }

    /**
     * @param  ImmunizationRecapitulation  $immunization
     * @return ImmunizationRecapitulation
     *
     * @throws GeneralException
     */
    public function restore(ImmunizationRecapitulation $immunization): ImmunizationRecapitulation
    {
        if ($immunization->restore()) {
            return $immunization;
        }

        throw new GeneralException(__('Terjadi kesalahan saat mengembalikan rekapitulasi cakupan imunisasi dasar lengkap. Silahkan coba lagi.'));
    }

    /**
     * @param  ImmunizationRecapitulation  $immunization
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(ImmunizationRecapitulation $immunization): bool
    {
        if ($immunization->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('Terjadi kesalahan saat menghapus secara permanan rekapitulasi cakupan imunisasi dasar lengkap. Silahkan coba lagi.'));
    }

    /**
     * @param  array  $data
     * @return ImmunizationRecapitulation
     */
    protected function createImmunizationRecapitulation(array $data = []): ImmunizationRecapitulation
    {
        return $this->model::create([
            'value' => $data['value'],
            'year' => $data['year'],
            'location_id' => $data['location_id'],
        ]);
    }
}
