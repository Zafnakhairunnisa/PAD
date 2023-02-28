<?php

namespace App\Domains\Cluster5\Services\PolisiDiy;

use App\Domains\Cluster5\Models\PolisiDiy\PolisiDiyRecapitulation;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class PolisiDiyRecapitulationService.
 */
class PolisiDiyRecapitulationService extends BaseService
{
    private $subjectMessage = 'rekapitulasi Polisi Daerah DIY';

    /**
     * PolisiDiyRecapitulationService constructor.
     *
     * @param  PolisiDiyRecapitulation  $education
     */
    public function __construct(PolisiDiyRecapitulation $education)
    {
        $this->model = $education;
    }

    /**
     * @param  array  $data
     * @return PolisiDiyRecapitulation
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): PolisiDiyRecapitulation
    {
        DB::beginTransaction();

        try {
            $education = $this->createPolisiDiyRecapitulation($data);
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
     * @param  PolisiDiyRecapitulation  $education
     * @param  array  $data
     * @return PolisiDiyRecapitulation
     *
     * @throws \Throwable
     */
    public function update(
        PolisiDiyRecapitulation $education,
        array $data = []
    ): PolisiDiyRecapitulation {
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
     * @param  PolisiDiyRecapitulation  $education
     * @return PolisiDiyRecapitulation
     *
     * @throws GeneralException
     */
    public function delete(
        PolisiDiyRecapitulation $education
        ): PolisiDiyRecapitulation {
        if ($this->deleteById($education->id)) {
            return $education;
        }

        throw new GeneralException(__('delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  PolisiDiyRecapitulation  $education
     * @return PolisiDiyRecapitulation
     *
     * @throws GeneralException
     */
    public function restore(
        PolisiDiyRecapitulation $education
        ): PolisiDiyRecapitulation {
        if ($education->restore()) {
            return $education;
        }

        throw new GeneralException(__('restore_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  PolisiDiyRecapitulation  $education
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(PolisiDiyRecapitulation $education): bool
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
     * @return PolisiDiyRecapitulation
     */
    protected function createPolisiDiyRecapitulation(
        array $data = []
        ): PolisiDiyRecapitulation {
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
