<?php

namespace App\Domains\Cluster5\Services\Bapas;

use App\Domains\Cluster5\Models\Bapas\BapasRecapitulation;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class BapasRecapitulationService.
 */
class BapasRecapitulationService extends BaseService
{
    private $subjectMessage = 'rekapitulasi Balai Pemasyarakatan DIY';

    /**
     * BapasRecapitulationService constructor.
     *
     * @param  BapasRecapitulation  $education
     */
    public function __construct(BapasRecapitulation $education)
    {
        $this->model = $education;
    }

    /**
     * @param  array  $data
     * @return BapasRecapitulation
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): BapasRecapitulation
    {
        DB::beginTransaction();

        try {
            $education = $this->createBapasRecapitulation($data);
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
     * @param  BapasRecapitulation  $education
     * @param  array  $data
     * @return BapasRecapitulation
     *
     * @throws \Throwable
     */
    public function update(
        BapasRecapitulation $education,
        array $data = []
    ): BapasRecapitulation {
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
     * @param  BapasRecapitulation  $education
     * @return BapasRecapitulation
     *
     * @throws GeneralException
     */
    public function delete(
        BapasRecapitulation $education
        ): BapasRecapitulation {
        if ($this->deleteById($education->id)) {
            return $education;
        }

        throw new GeneralException(__('delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  BapasRecapitulation  $education
     * @return BapasRecapitulation
     *
     * @throws GeneralException
     */
    public function restore(
        BapasRecapitulation $education
        ): BapasRecapitulation {
        if ($education->restore()) {
            return $education;
        }

        throw new GeneralException(__('restore_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  BapasRecapitulation  $education
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(BapasRecapitulation $education): bool
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
     * @return BapasRecapitulation
     */
    protected function createBapasRecapitulation(
        array $data = []
        ): BapasRecapitulation {
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
