<?php

namespace App\Domains\Cluster5\Services\Pengadilan;

use App\Domains\Cluster5\Models\Pengadilan\PengadilanRecapitulation;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class PengadilanRecapitulationService.
 */
class PengadilanRecapitulationService extends BaseService
{
    private $subjectMessage = 'rekapitulasi Pengadilan DIY';

    /**
     * PengadilanRecapitulationService constructor.
     *
     * @param  PengadilanRecapitulation  $education
     */
    public function __construct(PengadilanRecapitulation $education)
    {
        $this->model = $education;
    }

    /**
     * @param  array  $data
     * @return PengadilanRecapitulation
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): PengadilanRecapitulation
    {
        DB::beginTransaction();

        try {
            $education = $this->createPengadilanRecapitulation($data);
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
     * @param  PengadilanRecapitulation  $education
     * @param  array  $data
     * @return PengadilanRecapitulation
     *
     * @throws \Throwable
     */
    public function update(
        PengadilanRecapitulation $education,
        array $data = []
    ): PengadilanRecapitulation {
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
     * @param  PengadilanRecapitulation  $education
     * @return PengadilanRecapitulation
     *
     * @throws GeneralException
     */
    public function delete(
        PengadilanRecapitulation $education
        ): PengadilanRecapitulation {
        if ($this->deleteById($education->id)) {
            return $education;
        }

        throw new GeneralException(__('delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  PengadilanRecapitulation  $education
     * @return PengadilanRecapitulation
     *
     * @throws GeneralException
     */
    public function restore(
        PengadilanRecapitulation $education
        ): PengadilanRecapitulation {
        if ($education->restore()) {
            return $education;
        }

        throw new GeneralException(__('restore_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  PengadilanRecapitulation  $education
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(PengadilanRecapitulation $education): bool
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
     * @return PengadilanRecapitulation
     */
    protected function createPengadilanRecapitulation(
        array $data = []
        ): PengadilanRecapitulation {
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
