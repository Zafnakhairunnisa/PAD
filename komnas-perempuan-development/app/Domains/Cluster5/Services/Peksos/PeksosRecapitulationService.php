<?php

namespace App\Domains\Cluster5\Services\Peksos;

use App\Domains\Cluster5\Models\Peksos\PeksosRecapitulation;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class PeksosRecapitulationService.
 */
class PeksosRecapitulationService extends BaseService
{
    private $subjectMessage = 'rekapitulasi Pekerja Sosial';

    /**
     * PeksosRecapitulationService constructor.
     *
     * @param  PeksosRecapitulation  $education
     */
    public function __construct(PeksosRecapitulation $education)
    {
        $this->model = $education;
    }

    /**
     * @param  array  $data
     * @return PeksosRecapitulation
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): PeksosRecapitulation
    {
        DB::beginTransaction();

        try {
            $education = $this->createPeksosRecapitulation($data);
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
     * @param  PeksosRecapitulation  $education
     * @param  array  $data
     * @return PeksosRecapitulation
     *
     * @throws \Throwable
     */
    public function update(
        PeksosRecapitulation $education,
        array $data = []
    ): PeksosRecapitulation {
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
     * @param  PeksosRecapitulation  $education
     * @return PeksosRecapitulation
     *
     * @throws GeneralException
     */
    public function delete(
        PeksosRecapitulation $education
        ): PeksosRecapitulation {
        if ($this->deleteById($education->id)) {
            return $education;
        }

        throw new GeneralException(__('delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  PeksosRecapitulation  $education
     * @return PeksosRecapitulation
     *
     * @throws GeneralException
     */
    public function restore(
        PeksosRecapitulation $education
        ): PeksosRecapitulation {
        if ($education->restore()) {
            return $education;
        }

        throw new GeneralException(__('restore_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  PeksosRecapitulation  $education
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(PeksosRecapitulation $education): bool
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
     * @return PeksosRecapitulation
     */
    protected function createPeksosRecapitulation(
        array $data = []
        ): PeksosRecapitulation {
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
