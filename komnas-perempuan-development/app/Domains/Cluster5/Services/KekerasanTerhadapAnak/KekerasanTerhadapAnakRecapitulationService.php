<?php

namespace App\Domains\Cluster5\Services\KekerasanTerhadapAnak;

use App\Domains\Cluster5\Models\KekerasanTerhadapAnak\KekerasanTerhadapAnakRecapitulation;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class KekerasanTerhadapAnakRecapitulationService.
 */
class KekerasanTerhadapAnakRecapitulationService extends BaseService
{
    private $subjectMessage = 'rekapitulasi Kekerasan Terhdap Anak';

    /**
     * KekerasanTerhadapAnakRecapitulationService constructor.
     *
     * @param  KekerasanTerhadapAnakRecapitulation  $model
     */
    public function __construct(KekerasanTerhadapAnakRecapitulation $model)
    {
        $this->model = $model;
    }

    /**
     * @param  array  $data
     * @return KekerasanTerhadapAnakRecapitulation
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): KekerasanTerhadapAnakRecapitulation
    {
        DB::beginTransaction();

        try {
            $model = $this->createKekerasanTerhadapAnakRecapitulation($data);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('create_error :subject', [
                'subject' => $this->subjectMessage,
            ]));
        }

        DB::commit();

        return $model;
    }

    /**
     * @param  KekerasanTerhadapAnakRecapitulation  $model
     * @param  array  $data
     * @return KekerasanTerhadapAnakRecapitulation
     *
     * @throws \Throwable
     */
    public function update(
        KekerasanTerhadapAnakRecapitulation $model,
        array $data = []
    ): KekerasanTerhadapAnakRecapitulation {
        DB::beginTransaction();

        try {
            $model->update($this->createData($data));
        } catch (Exception $e) {
            DB::rollBack();
            throw new GeneralException(__('update_error :subject', [
                'subject' => $this->subjectMessage,
            ]));
        }

        DB::commit();

        return $model;
    }

    /**
     * @param  KekerasanTerhadapAnakRecapitulation  $model
     * @return KekerasanTerhadapAnakRecapitulation
     *
     * @throws GeneralException
     */
    public function delete(
        KekerasanTerhadapAnakRecapitulation $model
        ): KekerasanTerhadapAnakRecapitulation {
        if ($this->deleteById($model->id)) {
            return $model;
        }

        throw new GeneralException(__('delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  KekerasanTerhadapAnakRecapitulation  $model
     * @return KekerasanTerhadapAnakRecapitulation
     *
     * @throws GeneralException
     */
    public function restore(
        KekerasanTerhadapAnakRecapitulation $model
        ): KekerasanTerhadapAnakRecapitulation {
        if ($model->restore()) {
            return $model;
        }

        throw new GeneralException(__('restore_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  KekerasanTerhadapAnakRecapitulation  $model
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(KekerasanTerhadapAnakRecapitulation $model): bool
    {
        if ($model->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('force_delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  array  $data
     * @return KekerasanTerhadapAnakRecapitulation
     */
    protected function createKekerasanTerhadapAnakRecapitulation(
        array $data = []
        ): KekerasanTerhadapAnakRecapitulation {
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
            'gender' => $data['gender'] ?? null,
            'location_id' => $data['location_id'] ?? null,
            'category_id' => $data['category_id'] ?? null,
        ];
    }
}
