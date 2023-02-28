<?php

namespace App\Domains\Cluster5\Services\AnakKorbanTerorisme;

use App\Domains\Cluster5\Models\AnakKorbanTerorisme\AnakKorbanTerorismeRecapitulation;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class AnakKorbanTerorismeRecapitulationService.
 */
class AnakKorbanTerorismeRecapitulationService extends BaseService
{
    private $subjectMessage = 'rekapitulasi anak korban terorisme dan radikalisme';

    /**
     * AnakKorbanTerorismeRecapitulationService constructor.
     *
     * @param  AnakKorbanTerorismeRecapitulation  $model
     */
    public function __construct(AnakKorbanTerorismeRecapitulation $model)
    {
        $this->model = $model;
    }

    /**
     * @param  array  $data
     * @return AnakKorbanTerorismeRecapitulation
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): AnakKorbanTerorismeRecapitulation
    {
        DB::beginTransaction();

        try {
            $model = $this->createAnakKorbanTerorismeRecapitulation($data);
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
     * @param  AnakKorbanTerorismeRecapitulation  $model
     * @param  array  $data
     * @return AnakKorbanTerorismeRecapitulation
     *
     * @throws \Throwable
     */
    public function update(
        AnakKorbanTerorismeRecapitulation $model,
        array $data = []
    ): AnakKorbanTerorismeRecapitulation {
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
     * @param  AnakKorbanTerorismeRecapitulation  $model
     * @return AnakKorbanTerorismeRecapitulation
     *
     * @throws GeneralException
     */
    public function delete(
        AnakKorbanTerorismeRecapitulation $model
        ): AnakKorbanTerorismeRecapitulation {
        if ($this->deleteById($model->id)) {
            return $model;
        }

        throw new GeneralException(__('delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  AnakKorbanTerorismeRecapitulation  $model
     * @return AnakKorbanTerorismeRecapitulation
     *
     * @throws GeneralException
     */
    public function restore(
        AnakKorbanTerorismeRecapitulation $model
        ): AnakKorbanTerorismeRecapitulation {
        if ($model->restore()) {
            return $model;
        }

        throw new GeneralException(__('restore_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  AnakKorbanTerorismeRecapitulation  $model
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(AnakKorbanTerorismeRecapitulation $model): bool
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
     * @return AnakKorbanTerorismeRecapitulation
     */
    protected function createAnakKorbanTerorismeRecapitulation(
        array $data = []
        ): AnakKorbanTerorismeRecapitulation {
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
