<?php

namespace App\Domains\Cluster1\Services\ChildIdentityCard;

use App\Domains\Cluster1\Models\ChildIdentityCard;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class ChildIdentityCardService.
 */
class ChildIdentityCardService extends BaseService
{
    /**
     * ChildIdentityCardService constructor.
     *
     * @param  ChildIdentityCard  $birthCertificate
     */
    public function __construct(ChildIdentityCard $birthCertificate)
    {
        $this->model = $birthCertificate;
    }

    /**
     * @param  array  $data
     * @return ChildIdentityCard
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): ChildIdentityCard
    {
        DB::beginTransaction();

        try {
            $birthCertificate = $this->createChildIdentityCard([
                'category' => $data['category'],
                'location_id' => $data['location_id'],
                'gender' => $data['gender'],
                'value' => $data['value'],
                'year' => $data['year'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat membuat kepemilikan akta kelahiran. Silahkan coba lagi.'));
        }

        DB::commit();

        return $birthCertificate;
    }

    /**
     * @param  ChildIdentityCard  $birthCertificate
     * @param  array  $data
     * @return ChildIdentityCard
     *
     * @throws \Throwable
     */
    public function update(ChildIdentityCard $birthCertificate, array $data = []): ChildIdentityCard
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

            throw new GeneralException(__('Terjadi kesalahan saat memperbarui kepemilikan akta kelahiran. Silahkan coba lagi.'));
        }

        DB::commit();

        return $birthCertificate;
    }

    /**
     * @param  ChildIdentityCard  $birthCertificate
     * @return ChildIdentityCard
     *
     * @throws GeneralException
     */
    public function delete(ChildIdentityCard $birthCertificate): ChildIdentityCard
    {
        if ($this->deleteById($birthCertificate->id)) {
            return $birthCertificate;
        }

        throw new GeneralException('Terjadi kesalahan saat menghapus kepemilikan akta kelahiran. Silahkan coba lagi.');
    }

    /**
     * @param  ChildIdentityCard  $birthCertificate
     * @return ChildIdentityCard
     *
     * @throws GeneralException
     */
    public function restore(ChildIdentityCard $birthCertificate): ChildIdentityCard
    {
        if ($birthCertificate->restore()) {
            return $birthCertificate;
        }

        throw new GeneralException(__('Terjadi kesalahan saat mengembalikan kepemilikan akta kelahiran. Silahkan coba lagi.'));
    }

    /**
     * @param  ChildIdentityCard  $birthCertificate
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(ChildIdentityCard $birthCertificate): bool
    {
        if ($birthCertificate->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('Terjadi kesalahan saat menghapus secara permanan kepemilikan akta kelahiran. Silahkan coba lagi.'));
    }

    /**
     * @param  array  $data
     * @return ChildIdentityCard
     */
    protected function createChildIdentityCard(array $data = []): ChildIdentityCard
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
