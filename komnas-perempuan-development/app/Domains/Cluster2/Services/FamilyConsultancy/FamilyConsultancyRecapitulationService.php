<?php

namespace App\Domains\Cluster2\Services\FamilyConsultancy;

use App\Domains\Cluster2\Models\FamilyConsultancyRecapitulation;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class FamilyConsultancyRecapitulationService.
 */
class FamilyConsultancyRecapitulationService extends BaseService
{
    /**
     * FamilyConsultancyRecapitulationService constructor.
     *
     * @param  FamilyConsultancyRecapitulation  $recapitulation
     */
    public function __construct(FamilyConsultancyRecapitulation $recapitulation)
    {
        $this->model = $recapitulation;
    }

    /**
     * @param  array  $data
     * @return FamilyConsultancyRecapitulation
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): FamilyConsultancyRecapitulation
    {
        DB::beginTransaction();

        try {
            $recapitulation = $this->createFamilyConsultancyRecapitulation([
                'category' => $data['category'],
                'location_id' => $data['location_id'],
                'value' => $data['value'],
                'year' => $data['year'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat membuat rekapitulasi lembaga konsultasi keluarga. Silahkan coba lagi.'));
        }

        DB::commit();

        return $recapitulation;
    }

    /**
     * @param  FamilyConsultancyRecapitulation  $recapitulation
     * @param  array  $data
     * @return FamilyConsultancyRecapitulation
     *
     * @throws \Throwable
     */
    public function update(FamilyConsultancyRecapitulation $recapitulation, array $data = []): FamilyConsultancyRecapitulation
    {
        DB::beginTransaction();

        try {
            $recapitulation->update([
                'category' => $data['category'],
                'location_id' => $data['location_id'],
                'value' => $data['value'],
                'year' => $data['year'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat memperbarui rekapitulasi lembaga konsultasi keluarga. Silahkan coba lagi.'));
        }

        DB::commit();

        return $recapitulation;
    }

    /**
     * @param  FamilyConsultancyRecapitulation  $recapitulation
     * @return FamilyConsultancyRecapitulation
     *
     * @throws GeneralException
     */
    public function delete(FamilyConsultancyRecapitulation $recapitulation): FamilyConsultancyRecapitulation
    {
        if ($this->deleteById($recapitulation->id)) {
            return $recapitulation;
        }

        throw new GeneralException('Terjadi kesalahan saat menghapus rekapitulasi lembaga konsultasi keluarga. Silahkan coba lagi.');
    }

    /**
     * @param  FamilyConsultancyRecapitulation  $recapitulation
     * @return FamilyConsultancyRecapitulation
     *
     * @throws GeneralException
     */
    public function restore(FamilyConsultancyRecapitulation $recapitulation): FamilyConsultancyRecapitulation
    {
        if ($recapitulation->restore()) {
            return $recapitulation;
        }

        throw new GeneralException(__('Terjadi kesalahan saat mengembalikan rekapitulasi lembaga konsultasi keluarga. Silahkan coba lagi.'));
    }

    /**
     * @param  FamilyConsultancyRecapitulation  $recapitulation
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(FamilyConsultancyRecapitulation $recapitulation): bool
    {
        if ($recapitulation->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('Terjadi kesalahan saat menghapus secara permanan rekapitulasi lembaga konsultasi keluarga. Silahkan coba lagi.'));
    }

    /**
     * @param  array  $data
     * @return FamilyConsultancyRecapitulation
     */
    protected function createFamilyConsultancyRecapitulation(array $data = []): FamilyConsultancyRecapitulation
    {
        return $this->model::create([
            'category' => $data['category'] ?? null,
            'location_id' => $data['location_id'] ?? null,
            'value' => $data['value'] ?? null,
            'year' => $data['year'] ?? null,
        ]);
    }
}
