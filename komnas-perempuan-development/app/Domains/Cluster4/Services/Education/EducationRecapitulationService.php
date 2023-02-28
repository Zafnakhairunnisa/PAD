<?php

namespace App\Domains\Cluster4\Services\Education;

use App\Domains\Cluster4\Models\Education\EducationRecapitulation;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class EducationRecapitulationService.
 */
class EducationRecapitulationService extends BaseService
{
    private $subjectMessage = 'rekapitulasi pendidikan';

    /**
     * EducationRecapitulationService constructor.
     *
     * @param  EducationRecapitulation  $education
     */
    public function __construct(EducationRecapitulation $education)
    {
        $this->model = $education;
    }

    /**
     * @param  array  $data
     * @return EducationRecapitulation
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): EducationRecapitulation
    {
        DB::beginTransaction();

        try {
            $education = $this->createEducationRecapitulation($data);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('create_error :subject', [
                'subject' => $this->subjectMessage,
            ]));
        }

        DB::commit();

        return $education;
    }

    /**
     * @param  EducationRecapitulation  $education
     * @param  array  $data
     * @return EducationRecapitulation
     *
     * @throws \Throwable
     */
    public function update(
        EducationRecapitulation $education,
        array $data = []
    ): EducationRecapitulation {
        DB::beginTransaction();

        try {
            $education->update($this->createData($data));
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('update_error :subject', [
                'subject' => $this->subjectMessage,
            ]));
        }

        DB::commit();

        return $education;
    }

    /**
     * @param  EducationRecapitulation  $education
     * @return EducationRecapitulation
     *
     * @throws GeneralException
     */
    public function delete(
        EducationRecapitulation $education
        ): EducationRecapitulation {
        if ($this->deleteById($education->id)) {
            return $education;
        }

        throw new GeneralException(__('delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  EducationRecapitulation  $education
     * @return EducationRecapitulation
     *
     * @throws GeneralException
     */
    public function restore(
        EducationRecapitulation $education
        ): EducationRecapitulation {
        if ($education->restore()) {
            return $education;
        }

        throw new GeneralException(__('restore_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  EducationRecapitulation  $education
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(EducationRecapitulation $education): bool
    {
        if ($education->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('force_delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  array  $data
     * @return EducationRecapitulation
     */
    protected function createEducationRecapitulation(
        array $data = []
        ): EducationRecapitulation {
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
