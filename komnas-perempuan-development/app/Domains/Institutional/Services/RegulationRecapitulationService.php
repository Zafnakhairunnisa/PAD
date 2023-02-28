<?php

namespace App\Domains\Institutional\Services;

use App\Domains\Institutional\Models\RegulationRecapitulation;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class RegulationRecapitulationService.
 */
class RegulationRecapitulationService extends BaseService
{
    /**
     * RegulationRecapitulationService constructor.
     *
     * @param  RegulationRecapitulation  $regulationRecapitulation
     */
    public function __construct(RegulationRecapitulation $regulationRecapitulation)
    {
        $this->model = $regulationRecapitulation;
    }

    /**
     * @param  array  $data
     * @return RegulationRecapitulation
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): RegulationRecapitulation
    {
        DB::beginTransaction();

        try {
            $regulationRecapitulation = $this->createRegulationRecapitulation([
                'year' => $data['year'] ?? null,
                'category' => $data['category'] ?? null,
                'location_id' => $data['location_id'] ?? null,
                'value' => $data['value'] ?? null,
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat membuat rekapitulasi peraturan dan kebijakan ini. Silahkan coba lagi.'));
        }

        DB::commit();

        return $regulationRecapitulation;
    }

    /**
     * @param  RegulationRecapitulation  $regulationRecapitulation
     * @param  array  $data
     * @return RegulationRecapitulation
     *
     * @throws \Throwable
     */
    public function update(RegulationRecapitulation $regulationRecapitulation, array $data = []): RegulationRecapitulation
    {
        DB::beginTransaction();

        try {
            $regulationRecapitulation->update([
                'year' => $data['year'] ?? null,
                'category' => $data['category'] ?? null,
                'location_id' => $data['location_id'] ?? null,
                'value' => $data['value'] ?? null,
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat memperbarui rekapitulasi peraturan dan kebijakan ini. Silahkan coba lagi.'));
        }

        DB::commit();

        return $regulationRecapitulation;
    }

    /**
     * @param  RegulationRecapitulation  $regulationRecapitulation
     * @return RegulationRecapitulation
     *
     * @throws GeneralException
     */
    public function delete(RegulationRecapitulation $regulationRecapitulation): RegulationRecapitulation
    {
        if ($this->deleteById($regulationRecapitulation->id)) {
            return $regulationRecapitulation;
        }

        throw new GeneralException('Terjadi kesalahan saat menghapus rekapitulasi peraturan dan kebijakan ini. Silahkan coba lagi.');
    }

    /**
     * @param  RegulationRecapitulation  $regulationRecapitulation
     * @return RegulationRecapitulation
     *
     * @throws GeneralException
     */
    public function restore(RegulationRecapitulation $regulationRecapitulation): RegulationRecapitulation
    {
        if ($regulationRecapitulation->restore()) {
            return $regulationRecapitulation;
        }

        throw new GeneralException(__('Terjadi kesalahan saat mengembalikan rekapitulasi peraturan dan kebijakan ini. Silahkan coba lagi.'));
    }

    /**
     * @param  RegulationRecapitulation  $regulationRecapitulation
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(RegulationRecapitulation $regulationRecapitulation): bool
    {
        if ($regulationRecapitulation->forceDelete()) {
            // $this->model->images()->delete();
            return true;
        }

        throw new GeneralException(__('Terjadi kesalahan saat menghapus secara permanan rekapitulasi peraturan dan kebijakan ini. Silahkan coba lagi.'));
    }

    /**
     * @param  array  $data
     * @return RegulationRecapitulation
     */
    protected function createRegulationRecapitulation(array $data = []): RegulationRecapitulation
    {
        return $this->model::create([
            'year' => $data['year'] ?? null,
            'category' => $data['category'] ?? null,
            'location_id' => $data['location_id'] ?? null,
            'value' => $data['value'] ?? null,
        ]);
    }
}
