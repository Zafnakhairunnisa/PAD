<?php

namespace App\Domains\Cluster5\Services\PekerjaAnak;

use App\Domains\Cluster5\Models\PekerjaAnak\PekerjaAnakRecapitulation;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class PekerjaAnakRecapitulationService.
 */
class PekerjaAnakRecapitulationService extends BaseService
{
    private $subjectMessage = 'rekapitulasi pekerja anak';

    /**
     * PekerjaAnakRecapitulationService constructor.
     *
     * @param  PekerjaAnakRecapitulation  $education
     */
    public function __construct(PekerjaAnakRecapitulation $education)
    {
        $this->model = $education;
    }

    /**
     * @param  array  $data
     * @return PekerjaAnakRecapitulation
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): PekerjaAnakRecapitulation
    {
        DB::beginTransaction();

        try {
            $education = $this->createPekerjaAnakRecapitulation($data);
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
     * @param  PekerjaAnakRecapitulation  $education
     * @param  array  $data
     * @return PekerjaAnakRecapitulation
     *
     * @throws \Throwable
     */
    public function update(
        PekerjaAnakRecapitulation $education,
        array $data = []
    ): PekerjaAnakRecapitulation {
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
     * @param  PekerjaAnakRecapitulation  $education
     * @return PekerjaAnakRecapitulation
     *
     * @throws GeneralException
     */
    public function delete(
        PekerjaAnakRecapitulation $education
        ): PekerjaAnakRecapitulation {
        if ($this->deleteById($education->id)) {
            return $education;
        }

        throw new GeneralException(__('delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  PekerjaAnakRecapitulation  $education
     * @return PekerjaAnakRecapitulation
     *
     * @throws GeneralException
     */
    public function restore(
        PekerjaAnakRecapitulation $education
        ): PekerjaAnakRecapitulation {
        if ($education->restore()) {
            return $education;
        }

        throw new GeneralException(__('restore_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  PekerjaAnakRecapitulation  $education
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(PekerjaAnakRecapitulation $education): bool
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
     * @return PekerjaAnakRecapitulation
     */
    protected function createPekerjaAnakRecapitulation(
        array $data = []
        ): PekerjaAnakRecapitulation {
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
        ];
    }
}
