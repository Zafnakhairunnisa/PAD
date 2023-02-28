<?php

namespace App\Domains\Cluster3\Services\InfantMortality;

use App\Domains\Cluster3\Models\InfantMortality\InfantMortalityRecapitulation;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class InfantMortalityRecapitulationService.
 */
class InfantMortalityRecapitulationService extends BaseService
{
    /**
     * InfantMortalityRecapitulationService constructor.
     *
     * @param  InfantMortalityRecapitulation  $infantMortality
     */
    public function __construct(InfantMortalityRecapitulation $infantMortality)
    {
        $this->model = $infantMortality;
    }

    /**
     * @param  array  $data
     * @return InfantMortalityRecapitulation
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): InfantMortalityRecapitulation
    {
        DB::beginTransaction();

        try {
            $infantMortality = $this->createInfantMortalityRecapitulation([
                'value' => $data['value'],
                'year' => $data['year'],
                'location_id' => $data['location_id'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat membuat rekapitulasi angka kematian bayi (AKB). Silahkan coba lagi.'));
        }

        DB::commit();

        return $infantMortality;
    }

    /**
     * @param  InfantMortalityRecapitulation  $infantMortality
     * @param  array  $data
     * @return InfantMortalityRecapitulation
     *
     * @throws \Throwable
     */
    public function update(InfantMortalityRecapitulation $infantMortality, array $data = []): InfantMortalityRecapitulation
    {
        DB::beginTransaction();

        try {
            $infantMortality->update([
                'value' => $data['value'],
                'year' => $data['year'],
                'location_id' => $data['location_id'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat memperbarui rekapitulasi angka kematian bayi (AKB). Silahkan coba lagi.'));
        }

        DB::commit();

        return $infantMortality;
    }

    /**
     * @param  InfantMortalityRecapitulation  $infantMortality
     * @return InfantMortalityRecapitulation
     *
     * @throws GeneralException
     */
    public function delete(InfantMortalityRecapitulation $infantMortality): InfantMortalityRecapitulation
    {
        if ($this->deleteById($infantMortality->id)) {
            return $infantMortality;
        }

        throw new GeneralException('Terjadi kesalahan saat menghapus rekapitulasi angka kematian bayi (AKB). Silahkan coba lagi.');
    }

    /**
     * @param  InfantMortalityRecapitulation  $infantMortality
     * @return InfantMortalityRecapitulation
     *
     * @throws GeneralException
     */
    public function restore(InfantMortalityRecapitulation $infantMortality): InfantMortalityRecapitulation
    {
        if ($infantMortality->restore()) {
            return $infantMortality;
        }

        throw new GeneralException(__('Terjadi kesalahan saat mengembalikan rekapitulasi angka kematian bayi (AKB). Silahkan coba lagi.'));
    }

    /**
     * @param  InfantMortalityRecapitulation  $infantMortality
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(InfantMortalityRecapitulation $infantMortality): bool
    {
        if ($infantMortality->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('Terjadi kesalahan saat menghapus secara permanan rekapitulasi angka kematian bayi (AKB). Silahkan coba lagi.'));
    }

    /**
     * @param  array  $data
     * @return InfantMortalityRecapitulation
     */
    protected function createInfantMortalityRecapitulation(array $data = []): InfantMortalityRecapitulation
    {
        return $this->model::create([
            'value' => $data['value'],
            'year' => $data['year'],
            'location_id' => $data['location_id'],
        ]);
    }
}
