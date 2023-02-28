<?php

namespace App\Domains\Cluster2\Services\ChildFriendlyPlayroom;

use App\Domains\Cluster2\Models\ChildFriendlyPlayroom\ChildFriendlyPlayroomRecapitulation;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class ChildFriendlyPlayroomRecapitulationService.
 */
class ChildFriendlyPlayroomRecapitulationService extends BaseService
{
    /**
     * ChildFriendlyPlayroomRecapitulationService constructor.
     *
     * @param  ChildFriendlyPlayroomRecapitulation  $recapitulation
     */
    public function __construct(ChildFriendlyPlayroomRecapitulation $recapitulation)
    {
        $this->model = $recapitulation;
    }

    /**
     * @param  array  $data
     * @return ChildFriendlyPlayroomRecapitulation
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): ChildFriendlyPlayroomRecapitulation
    {
        DB::beginTransaction();

        try {
            $recapitulation = $this->createChildFriendlyPlayroomRecapitulation([
                'category_id' => $data['category_id'],
                'location_id' => $data['location_id'],
                'value' => $data['value'],
                'year' => $data['year'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat membuat rekapitulasi ruang bermain ramah anak. Silahkan coba lagi.'));
        }

        DB::commit();

        return $recapitulation;
    }

    /**
     * @param  ChildFriendlyPlayroomRecapitulation  $recapitulation
     * @param  array  $data
     * @return ChildFriendlyPlayroomRecapitulation
     *
     * @throws \Throwable
     */
    public function update(ChildFriendlyPlayroomRecapitulation $recapitulation, array $data = []): ChildFriendlyPlayroomRecapitulation
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

            throw new GeneralException(__('Terjadi kesalahan saat memperbarui rekapitulasi ruang bermain ramah anak. Silahkan coba lagi.'));
        }

        DB::commit();

        return $recapitulation;
    }

    /**
     * @param  ChildFriendlyPlayroomRecapitulation  $recapitulation
     * @return ChildFriendlyPlayroomRecapitulation
     *
     * @throws GeneralException
     */
    public function delete(ChildFriendlyPlayroomRecapitulation $recapitulation): ChildFriendlyPlayroomRecapitulation
    {
        if ($this->deleteById($recapitulation->id)) {
            return $recapitulation;
        }

        throw new GeneralException('Terjadi kesalahan saat menghapus rekapitulasi ruang bermain ramah anak. Silahkan coba lagi.');
    }

    /**
     * @param  ChildFriendlyPlayroomRecapitulation  $recapitulation
     * @return ChildFriendlyPlayroomRecapitulation
     *
     * @throws GeneralException
     */
    public function restore(ChildFriendlyPlayroomRecapitulation $recapitulation): ChildFriendlyPlayroomRecapitulation
    {
        if ($recapitulation->restore()) {
            return $recapitulation;
        }

        throw new GeneralException(__('Terjadi kesalahan saat mengembalikan rekapitulasi ruang bermain ramah anak. Silahkan coba lagi.'));
    }

    /**
     * @param  ChildFriendlyPlayroomRecapitulation  $recapitulation
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(ChildFriendlyPlayroomRecapitulation $recapitulation): bool
    {
        if ($recapitulation->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('Terjadi kesalahan saat menghapus secara permanan rekapitulasi ruang bermain ramah anak. Silahkan coba lagi.'));
    }

    /**
     * @param  array  $data
     * @return ChildFriendlyPlayroomRecapitulation
     */
    protected function createChildFriendlyPlayroomRecapitulation(array $data = []): ChildFriendlyPlayroomRecapitulation
    {
        return $this->model::create([
            'category_id' => $data['category_id'] ?? null,
            'location_id' => $data['location_id'] ?? null,
            'value' => $data['value'] ?? null,
            'year' => $data['year'] ?? null,
        ]);
    }
}
