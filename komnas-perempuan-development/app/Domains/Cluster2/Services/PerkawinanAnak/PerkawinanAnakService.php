<?php

namespace App\Domains\Cluster2\Services\PerkawinanAnak;

use App\Domains\Cluster2\Models\PerkawinanAnak;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class PerkawinanAnakService.
 */
class PerkawinanAnakService extends BaseService
{
    /**
     * PerkawinanAnakService constructor.
     *
     * @param  PerkawinanAnak  $perkawinanAnak
     */
    public function __construct(PerkawinanAnak $perkawinanAnak)
    {
        $this->model = $perkawinanAnak;
    }

    /**
     * @param  array  $data
     * @return PerkawinanAnak
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): PerkawinanAnak
    {
        DB::beginTransaction();

        try {
            $perkawinanAnak = $this->createPerkawinanAnak([
                'category' => $data['category'],
                'location_id' => $data['location_id'],
                'gender' => $data['gender'],
                'value' => $data['value'],
                'year' => $data['year'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat membuat perkawinan anak. Silahkan coba lagi.'));
        }

        DB::commit();

        return $perkawinanAnak;
    }

    /**
     * @param  PerkawinanAnak  $perkawinanAnak
     * @param  array  $data
     * @return PerkawinanAnak
     *
     * @throws \Throwable
     */
    public function update(PerkawinanAnak $perkawinanAnak, array $data = []): PerkawinanAnak
    {
        DB::beginTransaction();

        try {
            $perkawinanAnak->update([
                'category' => $data['category'],
                'location_id' => $data['location_id'],
                'gender' => $data['gender'],
                'value' => $data['value'],
                'year' => $data['year'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat memperbarui perkawinan anak. Silahkan coba lagi.'));
        }

        DB::commit();

        return $perkawinanAnak;
    }

    /**
     * @param  PerkawinanAnak  $perkawinanAnak
     * @return PerkawinanAnak
     *
     * @throws GeneralException
     */
    public function delete(PerkawinanAnak $perkawinanAnak): PerkawinanAnak
    {
        if ($this->deleteById($perkawinanAnak->id)) {
            return $perkawinanAnak;
        }

        throw new GeneralException('Terjadi kesalahan saat menghapus perkawinan anak. Silahkan coba lagi.');
    }

    /**
     * @param  PerkawinanAnak  $perkawinanAnak
     * @return PerkawinanAnak
     *
     * @throws GeneralException
     */
    public function restore(PerkawinanAnak $perkawinanAnak): PerkawinanAnak
    {
        if ($perkawinanAnak->restore()) {
            return $perkawinanAnak;
        }

        throw new GeneralException(__('Terjadi kesalahan saat mengembalikan perkawinan anak. Silahkan coba lagi.'));
    }

    /**
     * @param  PerkawinanAnak  $perkawinanAnak
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(PerkawinanAnak $perkawinanAnak): bool
    {
        if ($perkawinanAnak->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('Terjadi kesalahan saat menghapus secara permanan perkawinan anak. Silahkan coba lagi.'));
    }

    /**
     * @param  array  $data
     * @return PerkawinanAnak
     */
    protected function createPerkawinanAnak(array $data = []): PerkawinanAnak
    {
        return $this->model::create([
            'category' => $data['category'] ?? null,
            'location_id' => $data['location_id'] ?? null,
            'gender' => $data['gender'] ?? null,
            'value' => $data['value'] ?? null,
            'year' => $data['year'] ?? null,
        ]);
    }
}
