<?php

namespace App\Domains\Institutional\Services\Kelurahan;

use App\Domains\Institutional\Models\Kelurahan\KelurahanRecapitulation;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class KelurahanRecapitulationService.
 */
class KelurahanRecapitulationService extends BaseService
{
    private $subjectMessage = 'rekapitulasi Kelurahan';

    /**
     * KelurahanRecapitulationService constructor.
     *
     * @param  KelurahanRecapitulation  $kelurahan
     */
    public function __construct(KelurahanRecapitulation $kelurahan)
    {
        $this->model = $kelurahan;
    }

    /**
     * @param  array  $data
     * @return KelurahanRecapitulation
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): KelurahanRecapitulation
    {
        DB::beginTransaction();

        try {
            $kelurahan = $this->createKelurahanRecapitulation($data);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('create_error :subject', [
                'subject' => $this->subjectMessage,
            ]));
        }

        DB::commit();

        return $kelurahan;
    }

    /**
     * @param  KelurahanRecapitulation  $kelurahan
     * @param  array  $data
     * @return KelurahanRecapitulation
     *
     * @throws \Throwable
     */
    public function update(
        KelurahanRecapitulation $kelurahan,
        array $data = []
    ): KelurahanRecapitulation {
        DB::beginTransaction();

        try {
            $kelurahan->update($this->createData($data));
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('update_error :subject', [
                'subject' => $this->subjectMessage,
            ]));
        }

        DB::commit();

        return $kelurahan;
    }

    /**
     * @param  KelurahanRecapitulation  $kelurahan
     * @return KelurahanRecapitulation
     *
     * @throws GeneralException
     */
    public function delete(
        KelurahanRecapitulation $kelurahan
        ): KelurahanRecapitulation {
        if ($this->deleteById($kelurahan->id)) {
            return $kelurahan;
        }

        throw new GeneralException(__('delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  KelurahanRecapitulation  $kelurahan
     * @return KelurahanRecapitulation
     *
     * @throws GeneralException
     */
    public function restore(
        KelurahanRecapitulation $kelurahan
        ): KelurahanRecapitulation {
        if ($kelurahan->restore()) {
            return $kelurahan;
        }

        throw new GeneralException(__('restore_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  KelurahanRecapitulation  $kelurahan
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(KelurahanRecapitulation $kelurahan): bool
    {
        if ($kelurahan->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('force_delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  array  $data
     * @return KelurahanRecapitulation
     */
    protected function createKelurahanRecapitulation(
        array $data = []
        ): KelurahanRecapitulation {
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
            'category_id' => $data['category_id'] ?? null,
        ];
    }
}
