<?php

namespace App\Domains\Cluster1\Services\BirthCertificate;

use App\Domains\Cluster1\Models\BirthCertificate;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class BirthCertificateService.
 */
class BirthCertificateService extends BaseService
{
    /**
     * BirthCertificateService constructor.
     *
     * @param  BirthCertificate  $birthCertificate
     */
    public function __construct(BirthCertificate $birthCertificate)
    {
        $this->model = $birthCertificate;
    }

    /**
     * @param  array  $data
     * @return BirthCertificate
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): BirthCertificate
    {
        DB::beginTransaction();

        try {
            $birthCertificate = $this->createBirthCertificate([
                'category' => $data['category'],
                'location_id' => $data['location_id'],
                'gender' => $data['gender'],
                'value' => $data['value'],
                'year' => $data['year'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat membuat kepemilikan kartu. Silahkan coba lagi.'));
        }

        DB::commit();

        return $birthCertificate;
    }

    /**
     * @param  BirthCertificate  $birthCertificate
     * @param  array  $data
     * @return BirthCertificate
     *
     * @throws \Throwable
     */
    public function update(BirthCertificate $birthCertificate, array $data = []): BirthCertificate
    {
        DB::beginTransaction();

        try {
            $birthCertificate->update([
                'category' => $data['category'],
                'location_id' => $data['location_id'],
                'gender' => $data['gender'],
                'value' => $data['value'],
                'year' => $data['year'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat memperbarui kepemilikan kartu. Silahkan coba lagi.'));
        }

        DB::commit();

        return $birthCertificate;
    }

    /**
     * @param  BirthCertificate  $birthCertificate
     * @return BirthCertificate
     *
     * @throws GeneralException
     */
    public function delete(BirthCertificate $birthCertificate): BirthCertificate
    {
        if ($this->deleteById($birthCertificate->id)) {
            return $birthCertificate;
        }

        throw new GeneralException('Terjadi kesalahan saat menghapus kepemilikan kartu. Silahkan coba lagi.');
    }

    /**
     * @param  BirthCertificate  $birthCertificate
     * @return BirthCertificate
     *
     * @throws GeneralException
     */
    public function restore(BirthCertificate $birthCertificate): BirthCertificate
    {
        if ($birthCertificate->restore()) {
            return $birthCertificate;
        }

        throw new GeneralException(__('Terjadi kesalahan saat mengembalikan kepemilikan kartu. Silahkan coba lagi.'));
    }

    /**
     * @param  BirthCertificate  $birthCertificate
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(BirthCertificate $birthCertificate): bool
    {
        if ($birthCertificate->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('Terjadi kesalahan saat menghapus secara permanan kepemilikan kartu. Silahkan coba lagi.'));
    }

    /**
     * @param  array  $data
     * @return BirthCertificate
     */
    protected function createBirthCertificate(array $data = []): BirthCertificate
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
