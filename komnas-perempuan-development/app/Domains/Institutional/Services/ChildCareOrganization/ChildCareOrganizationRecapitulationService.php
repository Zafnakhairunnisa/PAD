<?php

namespace App\Domains\Institutional\Services\ChildCareOrganization;

use App\Domains\Institutional\Models\ChildCareOrganizationRecapitulation;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class ChildCareOrganizationRecapitulationService.
 */
class ChildCareOrganizationRecapitulationService extends BaseService
{
    /**
     * ChildCareOrganizationRecapitulationService constructor.
     *
     * @param  ChildCareOrganizationRecapitulation  $recapitulation
     */
    public function __construct(ChildCareOrganizationRecapitulation $recapitulation)
    {
        $this->model = $recapitulation;
    }

    /**
     * @param  array  $data
     * @return ChildCareOrganizationRecapitulation
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): ChildCareOrganizationRecapitulation
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

            throw new GeneralException(__('Terjadi kesalahan saat membuat rekapitulasi organisasi peduli anak. Silahkan coba lagi.'));
        }

        DB::commit();

        return $recapitulation;
    }

    /**
     * @param  ChildCareOrganizationRecapitulation  $recapitulation
     * @param  array  $data
     * @return ChildCareOrganizationRecapitulation
     *
     * @throws \Throwable
     */
    public function update(ChildCareOrganizationRecapitulation $recapitulation, array $data = []): ChildCareOrganizationRecapitulation
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

            throw new GeneralException(__('Terjadi kesalahan saat memperbarui rekapitulasi organisasi peduli anak. Silahkan coba lagi.'));
        }

        DB::commit();

        return $recapitulation;
    }

    /**
     * @param  ChildCareOrganizationRecapitulation  $recapitulation
     * @return ChildCareOrganizationRecapitulation
     *
     * @throws GeneralException
     */
    public function delete(ChildCareOrganizationRecapitulation $recapitulation): ChildCareOrganizationRecapitulation
    {
        if ($this->deleteById($recapitulation->id)) {
            return $recapitulation;
        }

        throw new GeneralException('Terjadi kesalahan saat menghapus rekapitulasi organisasi peduli anak. Silahkan coba lagi.');
    }

    /**
     * @param  ChildCareOrganizationRecapitulation  $recapitulation
     * @return ChildCareOrganizationRecapitulation
     *
     * @throws GeneralException
     */
    public function restore(ChildCareOrganizationRecapitulation $recapitulation): ChildCareOrganizationRecapitulation
    {
        if ($recapitulation->restore()) {
            return $recapitulation;
        }

        throw new GeneralException(__('Terjadi kesalahan saat mengembalikan rekapitulasi organisasi peduli anak. Silahkan coba lagi.'));
    }

    /**
     * @param  ChildCareOrganizationRecapitulation  $recapitulation
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(ChildCareOrganizationRecapitulation $recapitulation): bool
    {
        if ($recapitulation->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('Terjadi kesalahan saat menghapus secara permanen rekapitulasi organisasi peduli anak. Silahkan coba lagi.'));
    }

    /**
     * @param  array  $data
     * @return ChildCareOrganizationRecapitulation
     */
    protected function createChildProtectionActivity(array $data = []): ChildCareOrganizationRecapitulation
    {
        return $this->model::create([
            'value' => $data['value'] ?? null,
            'year' => $data['year'] ?? null,
            'location_id' => $data['location_id'] ?? null,
        ]);
    }
}
