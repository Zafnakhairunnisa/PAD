<?php

namespace App\Domains\Cluster3\Services\MaternalDeath;

use App\Domains\Cluster3\Models\MaternalDeath\MaternalDeathRecapitulation;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class MaternalDeathRecapitulationService.
 */
class MaternalDeathRecapitulationService extends BaseService
{
    /**
     * MaternalDeathRecapitulationService constructor.
     *
     * @param  MaternalDeathRecapitulation  $maternalDeath
     */
    public function __construct(MaternalDeathRecapitulation $maternalDeath)
    {
        $this->model = $maternalDeath;
    }

    /**
     * @param  array  $data
     * @return MaternalDeathRecapitulation
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): MaternalDeathRecapitulation
    {
        DB::beginTransaction();

        try {
            $maternalDeath = $this->createMaternalDeathRecapitulation($data);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat membuat rekapitulasi kematian ibu melahirkan. Silahkan coba lagi.'));
        }

        DB::commit();

        return $maternalDeath;
    }

    /**
     * @param  MaternalDeathRecapitulation  $maternalDeath
     * @param  array  $data
     * @return MaternalDeathRecapitulation
     *
     * @throws \Throwable
     */
    public function update(MaternalDeathRecapitulation $maternalDeath, array $data = []): MaternalDeathRecapitulation
    {
        DB::beginTransaction();

        try {
            $maternalDeath->update($this->createData($data));
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat memperbarui rekapitulasi kematian ibu melahirkan. Silahkan coba lagi.'));
        }

        DB::commit();

        return $maternalDeath;
    }

    /**
     * @param  MaternalDeathRecapitulation  $maternalDeath
     * @return MaternalDeathRecapitulation
     *
     * @throws GeneralException
     */
    public function delete(MaternalDeathRecapitulation $maternalDeath): MaternalDeathRecapitulation
    {
        if ($this->deleteById($maternalDeath->id)) {
            return $maternalDeath;
        }

        throw new GeneralException('Terjadi kesalahan saat menghapus rekapitulasi kematian ibu melahirkan. Silahkan coba lagi.');
    }

    /**
     * @param  MaternalDeathRecapitulation  $maternalDeath
     * @return MaternalDeathRecapitulation
     *
     * @throws GeneralException
     */
    public function restore(MaternalDeathRecapitulation $maternalDeath): MaternalDeathRecapitulation
    {
        if ($maternalDeath->restore()) {
            return $maternalDeath;
        }

        throw new GeneralException(__('Terjadi kesalahan saat mengembalikan rekapitulasi kematian ibu melahirkan. Silahkan coba lagi.'));
    }

    /**
     * @param  MaternalDeathRecapitulation  $maternalDeath
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(MaternalDeathRecapitulation $maternalDeath): bool
    {
        if ($maternalDeath->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('Terjadi kesalahan saat menghapus secara permanan rekapitulasi kematian ibu melahirkan. Silahkan coba lagi.'));
    }

    /**
     * @param  array  $data
     * @return MaternalDeathRecapitulation
     */
    protected function createMaternalDeathRecapitulation(array $data = []): MaternalDeathRecapitulation
    {
        return $this->model::create($this->createData($data));
    }

    /**
     * @param  array  $data
     * @return array
     */
    private function createData(array $data = []): array
    {
        return [
            'value' => $data['value'] ?? null,
            'year' => $data['year'] ?? null,
            'location_id' => $data['location_id'] ?? null,
        ];
    }
}
