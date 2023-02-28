<?php

namespace App\Domains\Cluster3\Services\MedicalFacility;

use App\Domains\Cluster3\Models\MedicalFacility\MedicalFacilityRecapitulation;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class MedicalFacilityRecapitulationService.
 */
class MedicalFacilityRecapitulationService extends BaseService
{
    private $subjectMessage = 'rekapitulasi fasilitas kesehatan ramah anak';

    /**
     * MedicalFacilityRecapitulationService constructor.
     *
     * @param  MedicalFacilityRecapitulation  $medicalFacility
     */
    public function __construct(MedicalFacilityRecapitulation $medicalFacility)
    {
        $this->model = $medicalFacility;
    }

    /**
     * @param  array  $data
     * @return MedicalFacilityRecapitulation
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): MedicalFacilityRecapitulation
    {
        DB::beginTransaction();

        try {
            $medicalFacility = $this->createMedicalFacilityRecapitulation($data);
        } catch (Exception $e) {
            DB::rollBack();
            report($e);

            throw new GeneralException(__('create_error :subject', [
                'subject' => $this->subjectMessage,
            ]));
        }

        DB::commit();

        return $medicalFacility;
    }

    /**
     * @param  MedicalFacilityRecapitulation  $medicalFacility
     * @param  array  $data
     * @return MedicalFacilityRecapitulation
     *
     * @throws \Throwable
     */
    public function update(
        MedicalFacilityRecapitulation $medicalFacility,
        array $data = []
    ): MedicalFacilityRecapitulation {
        DB::beginTransaction();

        try {
            $medicalFacility->update($this->createData($data));
        } catch (Exception $e) {
            DB::rollBack();
            report($e);

            throw new GeneralException(__('update_error :subject', [
                'subject' => $this->subjectMessage,
            ]));
        }

        DB::commit();

        return $medicalFacility;
    }

    /**
     * @param  MedicalFacilityRecapitulation  $medicalFacility
     * @return MedicalFacilityRecapitulation
     *
     * @throws GeneralException
     */
    public function delete(
        MedicalFacilityRecapitulation $medicalFacility
        ): MedicalFacilityRecapitulation {
        if ($this->deleteById($medicalFacility->id)) {
            return $medicalFacility;
        }

        throw new GeneralException(__('delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  MedicalFacilityRecapitulation  $medicalFacility
     * @return MedicalFacilityRecapitulation
     *
     * @throws GeneralException
     */
    public function restore(
        MedicalFacilityRecapitulation $medicalFacility
        ): MedicalFacilityRecapitulation {
        if ($medicalFacility->restore()) {
            return $medicalFacility;
        }

        throw new GeneralException(__('restore_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  MedicalFacilityRecapitulation  $medicalFacility
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(MedicalFacilityRecapitulation $medicalFacility): bool
    {
        if ($medicalFacility->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('force_delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  array  $data
     * @return MedicalFacilityRecapitulation
     */
    protected function createMedicalFacilityRecapitulation(
        array $data = []
        ): MedicalFacilityRecapitulation {
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
