<?php

namespace App\Domains\Cluster3\Services\ChildBirth;

use App\Domains\Cluster3\Models\ChildBirth\ChildBirthRecapitulation;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class ChildBirthRecapitulationService.
 */
class ChildBirthRecapitulationService extends BaseService
{
    /**
     * ChildBirthRecapitulationService constructor.
     *
     * @param  ChildBirthRecapitulation  $childBirth
     */
    public function __construct(ChildBirthRecapitulation $childBirth)
    {
        $this->model = $childBirth;
    }

    /**
     * @param  array  $data
     * @return ChildBirthRecapitulation
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): ChildBirthRecapitulation
    {
        DB::beginTransaction();

        try {
            $childBirth = $this->createChildBirthRecapitulation([
                'value' => $data['value'],
                'year' => $data['year'],
                'location_id' => $data['location_id'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat membuat rekapitulasi persalinan di fasilitas kesehatan. Silahkan coba lagi.'));
        }

        DB::commit();

        return $childBirth;
    }

    /**
     * @param  ChildBirthRecapitulation  $childBirth
     * @param  array  $data
     * @return ChildBirthRecapitulation
     *
     * @throws \Throwable
     */
    public function update(ChildBirthRecapitulation $childBirth, array $data = []): ChildBirthRecapitulation
    {
        DB::beginTransaction();

        try {
            $childBirth->update([
                'value' => $data['value'],
                'year' => $data['year'],
                'location_id' => $data['location_id'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat memperbarui rekapitulasi persalinan di fasilitas kesehatan. Silahkan coba lagi.'));
        }

        DB::commit();

        return $childBirth;
    }

    /**
     * @param  ChildBirthRecapitulation  $childBirth
     * @return ChildBirthRecapitulation
     *
     * @throws GeneralException
     */
    public function delete(ChildBirthRecapitulation $childBirth): ChildBirthRecapitulation
    {
        if ($this->deleteById($childBirth->id)) {
            return $childBirth;
        }

        throw new GeneralException('Terjadi kesalahan saat menghapus rekapitulasi persalinan di fasilitas kesehatan. Silahkan coba lagi.');
    }

    /**
     * @param  ChildBirthRecapitulation  $childBirth
     * @return ChildBirthRecapitulation
     *
     * @throws GeneralException
     */
    public function restore(ChildBirthRecapitulation $childBirth): ChildBirthRecapitulation
    {
        if ($childBirth->restore()) {
            return $childBirth;
        }

        throw new GeneralException(__('Terjadi kesalahan saat mengembalikan rekapitulasi persalinan di fasilitas kesehatan. Silahkan coba lagi.'));
    }

    /**
     * @param  ChildBirthRecapitulation  $childBirth
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(ChildBirthRecapitulation $childBirth): bool
    {
        if ($childBirth->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('Terjadi kesalahan saat menghapus secara permanan rekapitulasi persalinan di fasilitas kesehatan. Silahkan coba lagi.'));
    }

    /**
     * @param  array  $data
     * @return ChildBirthRecapitulation
     */
    protected function createChildBirthRecapitulation(array $data = []): ChildBirthRecapitulation
    {
        return $this->model::create([
            'value' => $data['value'],
            'year' => $data['year'],
            'location_id' => $data['location_id'],
        ]);
    }
}
