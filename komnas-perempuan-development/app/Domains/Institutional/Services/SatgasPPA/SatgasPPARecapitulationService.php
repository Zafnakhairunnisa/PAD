<?php

namespace App\Domains\Institutional\Services\SatgasPPA;

use App\Domains\Institutional\Models\SatgasPPARecapitulation;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class SatgasPPARecapitulationService.
 */
class SatgasPPARecapitulationService extends BaseService
{
    /**
     * SatgasPPARecapitulationService constructor.
     *
     * @param  SatgasPPARecapitulation  $recapitulation
     */
    public function __construct(SatgasPPARecapitulation $recapitulation)
    {
        $this->model = $recapitulation;
    }

    /**
     * @param  array  $data
     * @return SatgasPPARecapitulation
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): SatgasPPARecapitulation
    {
        DB::beginTransaction();

        try {
            $recapitulation = $this->createChildProtectionActivity([
                'value_diy' => $data['value_diy'],
                'value_kabupaten' => $data['value_kabupaten'],
                'value_kapanewon' => $data['value_kapanewon'],
                'value_kalurahan' => $data['value_kalurahan'],
                'year' => $data['year'],
                'location_id' => $data['location_id'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat membuat rekapitulasi satgas ppa. Silahkan coba lagi.'));
        }

        DB::commit();

        return $recapitulation;
    }

    /**
     * @param  SatgasPPARecapitulation  $recapitulation
     * @param  array  $data
     * @return SatgasPPARecapitulation
     *
     * @throws \Throwable
     */
    public function update(SatgasPPARecapitulation $recapitulation, array $data = []): SatgasPPARecapitulation
    {
        DB::beginTransaction();

        try {
            $recapitulation->update([
                'value_diy' => $data['value_diy'],
                'value_kabupaten' => $data['value_kabupaten'],
                'value_kapanewon' => $data['value_kapanewon'],
                'value_kalurahan' => $data['value_kalurahan'],
                'year' => $data['year'],
                'location_id' => $data['location_id'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat memperbarui rekapitulasi satgas ppa. Silahkan coba lagi.'));
        }

        DB::commit();

        return $recapitulation;
    }

    /**
     * @param  SatgasPPARecapitulation  $recapitulation
     * @return SatgasPPARecapitulation
     *
     * @throws GeneralException
     */
    public function delete(SatgasPPARecapitulation $recapitulation): SatgasPPARecapitulation
    {
        if ($this->deleteById($recapitulation->id)) {
            return $recapitulation;
        }

        throw new GeneralException('Terjadi kesalahan saat menghapus rekapitulasi satgas ppa. Silahkan coba lagi.');
    }

    /**
     * @param  SatgasPPARecapitulation  $recapitulation
     * @return SatgasPPARecapitulation
     *
     * @throws GeneralException
     */
    public function restore(SatgasPPARecapitulation $recapitulation): SatgasPPARecapitulation
    {
        if ($recapitulation->restore()) {
            return $recapitulation;
        }

        throw new GeneralException(__('Terjadi kesalahan saat mengembalikan rekapitulasi satgas ppa. Silahkan coba lagi.'));
    }

    /**
     * @param  SatgasPPARecapitulation  $recapitulation
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(SatgasPPARecapitulation $recapitulation): bool
    {
        if ($recapitulation->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('Terjadi kesalahan saat menghapus secara permanen rekapitulasi satgas ppa. Silahkan coba lagi.'));
    }

    /**
     * @param  array  $data
     * @return SatgasPPARecapitulation
     */
    protected function createChildProtectionActivity(array $data = []): SatgasPPARecapitulation
    {
        return $this->model::create([
            'value_diy' => $data['value_diy'] ?? null,
            'value_kabupaten' => $data['value_kabupaten'] ?? null,
            'value_kapanewon' => $data['value_kapanewon'] ?? null,
            'value_kalurahan' => $data['value_kalurahan'] ?? null,
            'year' => $data['year'] ?? null,
            'location_id' => $data['location_id'] ?? null,
        ]);
    }
}
