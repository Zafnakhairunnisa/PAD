<?php

namespace App\Domains\Cluster3\Services\BreastFeeding;

use App\Domains\Cluster3\Models\BreastFeeding\BreastFeedingRecapitulation;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class BreastFeedingRecapitulationService.
 */
class BreastFeedingRecapitulationService extends BaseService
{
    private $subjectMessage = 'rekapitulasi pemberian air susu ibu';

    /**
     * BreastFeedingRecapitulationService constructor.
     *
     * @param  BreastFeedingRecapitulation  $breastFeeding
     */
    public function __construct(BreastFeedingRecapitulation $breastFeeding)
    {
        $this->model = $breastFeeding;
    }

    /**
     * @param  array  $data
     * @return BreastFeedingRecapitulation
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): BreastFeedingRecapitulation
    {
        DB::beginTransaction();

        try {
            $breastFeeding = $this->createBreastFeedingRecapitulation($data);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('create_error :subject', [
                'subject' => $this->subjectMessage,
            ]));
        }

        DB::commit();

        return $breastFeeding;
    }

    /**
     * @param  BreastFeedingRecapitulation  $breastFeeding
     * @param  array  $data
     * @return BreastFeedingRecapitulation
     *
     * @throws \Throwable
     */
    public function update(
        BreastFeedingRecapitulation $breastFeeding,
        array $data = []
    ): BreastFeedingRecapitulation {
        DB::beginTransaction();

        try {
            $breastFeeding->update($this->createData($data));
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('update_error :subject', [
                'subject' => $this->subjectMessage,
            ]));
        }

        DB::commit();

        return $breastFeeding;
    }

    /**
     * @param  BreastFeedingRecapitulation  $breastFeeding
     * @return BreastFeedingRecapitulation
     *
     * @throws GeneralException
     */
    public function delete(
        BreastFeedingRecapitulation $breastFeeding
        ): BreastFeedingRecapitulation {
        if ($this->deleteById($breastFeeding->id)) {
            return $breastFeeding;
        }

        throw new GeneralException(__('delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  BreastFeedingRecapitulation  $breastFeeding
     * @return BreastFeedingRecapitulation
     *
     * @throws GeneralException
     */
    public function restore(
        BreastFeedingRecapitulation $breastFeeding
        ): BreastFeedingRecapitulation {
        if ($breastFeeding->restore()) {
            return $breastFeeding;
        }

        throw new GeneralException(__('restore_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  BreastFeedingRecapitulation  $breastFeeding
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(BreastFeedingRecapitulation $breastFeeding): bool
    {
        if ($breastFeeding->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('force_delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  array  $data
     * @return BreastFeedingRecapitulation
     */
    protected function createBreastFeedingRecapitulation(
        array $data = []
        ): BreastFeedingRecapitulation {
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
