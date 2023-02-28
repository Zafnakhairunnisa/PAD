<?php

namespace App\Domains\Cluster4\Services\PusatKreatifitasAnak;

use App\Domains\Cluster4\Models\PusatKreatifitasAnak\PusatKreatifitasAnakRecapitulation;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class PusatKreatifitasAnakRecapitulationService.
 */
class PusatKreatifitasAnakRecapitulationService extends BaseService
{
    private $subjectMessage = 'rekapitulasi pusat kreatifitas anak';

    /**
     * PusatKreatifitasAnakRecapitulationService constructor.
     *
     * @param  PusatKreatifitasAnakRecapitulation  $education
     */
    public function __construct(PusatKreatifitasAnakRecapitulation $education)
    {
        $this->model = $education;
    }

    /**
     * @param  array  $data
     * @return PusatKreatifitasAnakRecapitulation
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): PusatKreatifitasAnakRecapitulation
    {
        DB::beginTransaction();

        try {
            $education = $this->createPusatKreatifitasAnakRecapitulation($data);
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
     * @param  PusatKreatifitasAnakRecapitulation  $education
     * @param  array  $data
     * @return PusatKreatifitasAnakRecapitulation
     *
     * @throws \Throwable
     */
    public function update(
        PusatKreatifitasAnakRecapitulation $education,
        array $data = []
    ): PusatKreatifitasAnakRecapitulation {
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
     * @param  PusatKreatifitasAnakRecapitulation  $education
     * @return PusatKreatifitasAnakRecapitulation
     *
     * @throws GeneralException
     */
    public function delete(
        PusatKreatifitasAnakRecapitulation $education
        ): PusatKreatifitasAnakRecapitulation {
        if ($this->deleteById($education->id)) {
            return $education;
        }

        throw new GeneralException(__('delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  PusatKreatifitasAnakRecapitulation  $education
     * @return PusatKreatifitasAnakRecapitulation
     *
     * @throws GeneralException
     */
    public function restore(
        PusatKreatifitasAnakRecapitulation $education
        ): PusatKreatifitasAnakRecapitulation {
        if ($education->restore()) {
            return $education;
        }

        throw new GeneralException(__('restore_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  PusatKreatifitasAnakRecapitulation  $education
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(PusatKreatifitasAnakRecapitulation $education): bool
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
     * @return PusatKreatifitasAnakRecapitulation
     */
    protected function createPusatKreatifitasAnakRecapitulation(
        array $data = []
        ): PusatKreatifitasAnakRecapitulation {
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
