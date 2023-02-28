<?php

namespace App\Domains\Cluster3\Services\MotherAndDaughterCard;

use App\Domains\Cluster3\Models\MotherAndDaughterCard\MotherAndDaughterCardRecapitulation;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class MotherAndDaughterCardRecapitulationService.
 */
class MotherAndDaughterCardRecapitulationService extends BaseService
{
    /**
     * MotherAndDaughterCardRecapitulationService constructor.
     *
     * @param  MotherAndDaughterCardRecapitulation  $motherAndDaughterCard
     */
    public function __construct(MotherAndDaughterCardRecapitulation $motherAndDaughterCard)
    {
        $this->model = $motherAndDaughterCard;
    }

    /**
     * @param  array  $data
     * @return MotherAndDaughterCardRecapitulation
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): MotherAndDaughterCardRecapitulation
    {
        DB::beginTransaction();

        try {
            $motherAndDaughterCard = $this->createMotherAndDaughterCardRecapitulation([
                'value' => $data['value'],
                'year' => $data['year'],
                'location_id' => $data['location_id'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat membuat rekapitulasi kartu ibu dan anak. Silahkan coba lagi.'));
        }

        DB::commit();

        return $motherAndDaughterCard;
    }

    /**
     * @param  MotherAndDaughterCardRecapitulation  $motherAndDaughterCard
     * @param  array  $data
     * @return MotherAndDaughterCardRecapitulation
     *
     * @throws \Throwable
     */
    public function update(MotherAndDaughterCardRecapitulation $motherAndDaughterCard, array $data = []): MotherAndDaughterCardRecapitulation
    {
        DB::beginTransaction();

        try {
            $motherAndDaughterCard->update([
                'value' => $data['value'],
                'year' => $data['year'],
                'location_id' => $data['location_id'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat memperbarui rekapitulasi kartu ibu dan anak. Silahkan coba lagi.'));
        }

        DB::commit();

        return $motherAndDaughterCard;
    }

    /**
     * @param  MotherAndDaughterCardRecapitulation  $motherAndDaughterCard
     * @return MotherAndDaughterCardRecapitulation
     *
     * @throws GeneralException
     */
    public function delete(MotherAndDaughterCardRecapitulation $motherAndDaughterCard): MotherAndDaughterCardRecapitulation
    {
        if ($this->deleteById($motherAndDaughterCard->id)) {
            return $motherAndDaughterCard;
        }

        throw new GeneralException('Terjadi kesalahan saat menghapus rekapitulasi kartu ibu dan anak. Silahkan coba lagi.');
    }

    /**
     * @param  MotherAndDaughterCardRecapitulation  $motherAndDaughterCard
     * @return MotherAndDaughterCardRecapitulation
     *
     * @throws GeneralException
     */
    public function restore(MotherAndDaughterCardRecapitulation $motherAndDaughterCard): MotherAndDaughterCardRecapitulation
    {
        if ($motherAndDaughterCard->restore()) {
            return $motherAndDaughterCard;
        }

        throw new GeneralException(__('Terjadi kesalahan saat mengembalikan rekapitulasi kartu ibu dan anak. Silahkan coba lagi.'));
    }

    /**
     * @param  MotherAndDaughterCardRecapitulation  $motherAndDaughterCard
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(MotherAndDaughterCardRecapitulation $motherAndDaughterCard): bool
    {
        if ($motherAndDaughterCard->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('Terjadi kesalahan saat menghapus secara permanan rekapitulasi kartu ibu dan anak. Silahkan coba lagi.'));
    }

    /**
     * @param  array  $data
     * @return MotherAndDaughterCardRecapitulation
     */
    protected function createMotherAndDaughterCardRecapitulation(array $data = []): MotherAndDaughterCardRecapitulation
    {
        return $this->model::create([
            'value' => $data['value'],
            'year' => $data['year'],
            'location_id' => $data['location_id'],
        ]);
    }
}
