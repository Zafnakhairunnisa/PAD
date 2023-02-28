<?php

namespace App\Domains\Cluster3\Services\ChildNutrition;

use App\Domains\Cluster3\Models\ChildNutrition\ChildNutritionRecapitulation;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class ChildNutritionRecapitulationService.
 */
class ChildNutritionRecapitulationService extends BaseService
{
    private $subjectMessage = 'rekapitulasi status gizi anak';

    /**
     * ChildNutritionRecapitulationService constructor.
     *
     * @param  ChildNutritionRecapitulation  $childNutrition
     */
    public function __construct(ChildNutritionRecapitulation $childNutrition)
    {
        $this->model = $childNutrition;
    }

    /**
     * @param  array  $data
     * @return ChildNutritionRecapitulation
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): ChildNutritionRecapitulation
    {
        DB::beginTransaction();

        try {
            $childNutrition = $this->createChildNutritionRecapitulation($data);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('create_error :subject', [
                'subject' => $this->subjectMessage,
            ]));
        }

        DB::commit();

        return $childNutrition;
    }

    /**
     * @param  ChildNutritionRecapitulation  $childNutrition
     * @param  array  $data
     * @return ChildNutritionRecapitulation
     *
     * @throws \Throwable
     */
    public function update(
        ChildNutritionRecapitulation $childNutrition,
        array $data = []
    ): ChildNutritionRecapitulation {
        DB::beginTransaction();

        try {
            $childNutrition->update($this->createData($data));
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('update_error :subject', [
                'subject' => $this->subjectMessage,
            ]));
        }

        DB::commit();

        return $childNutrition;
    }

    /**
     * @param  ChildNutritionRecapitulation  $childNutrition
     * @return ChildNutritionRecapitulation
     *
     * @throws GeneralException
     */
    public function delete(
        ChildNutritionRecapitulation $childNutrition
        ): ChildNutritionRecapitulation {
        if ($this->deleteById($childNutrition->id)) {
            return $childNutrition;
        }

        throw new GeneralException(__('delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  ChildNutritionRecapitulation  $childNutrition
     * @return ChildNutritionRecapitulation
     *
     * @throws GeneralException
     */
    public function restore(
        ChildNutritionRecapitulation $childNutrition
        ): ChildNutritionRecapitulation {
        if ($childNutrition->restore()) {
            return $childNutrition;
        }

        throw new GeneralException(__('restore_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  ChildNutritionRecapitulation  $childNutrition
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(ChildNutritionRecapitulation $childNutrition): bool
    {
        if ($childNutrition->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('force_delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  array  $data
     * @return ChildNutritionRecapitulation
     */
    protected function createChildNutritionRecapitulation(
        array $data = []
        ): ChildNutritionRecapitulation {
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
