<?php

namespace App\Domains\Cluster4\Services\RumahIbadahRamahAnak;

use App\Domains\Cluster4\Models\RumahIbadahRamahAnak\RumahIbadahRamahAnakRecapitulation;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class RumahIbadahRamahAnakRecapitulationService.
 */
class RumahIbadahRamahAnakRecapitulationService extends BaseService
{
    private $subjectMessage = 'rekapitulasi rumah ibadah ramah anak';

    /**
     * RumahIbadahRamahAnakRecapitulationService constructor.
     *
     * @param  RumahIbadahRamahAnakRecapitulation  $education
     */
    public function __construct(RumahIbadahRamahAnakRecapitulation $education)
    {
        $this->model = $education;
    }

    /**
     * @param  array  $data
     * @return RumahIbadahRamahAnakRecapitulation
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): RumahIbadahRamahAnakRecapitulation
    {
        DB::beginTransaction();

        try {
            $education = $this->createRumahIbadahRamahAnakRecapitulation($data);
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
     * @param  RumahIbadahRamahAnakRecapitulation  $education
     * @param  array  $data
     * @return RumahIbadahRamahAnakRecapitulation
     *
     * @throws \Throwable
     */
    public function update(
        RumahIbadahRamahAnakRecapitulation $education,
        array $data = []
    ): RumahIbadahRamahAnakRecapitulation {
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
     * @param  RumahIbadahRamahAnakRecapitulation  $education
     * @return RumahIbadahRamahAnakRecapitulation
     *
     * @throws GeneralException
     */
    public function delete(
        RumahIbadahRamahAnakRecapitulation $education
        ): RumahIbadahRamahAnakRecapitulation {
        if ($this->deleteById($education->id)) {
            return $education;
        }

        throw new GeneralException(__('delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  RumahIbadahRamahAnakRecapitulation  $education
     * @return RumahIbadahRamahAnakRecapitulation
     *
     * @throws GeneralException
     */
    public function restore(
        RumahIbadahRamahAnakRecapitulation $education
        ): RumahIbadahRamahAnakRecapitulation {
        if ($education->restore()) {
            return $education;
        }

        throw new GeneralException(__('restore_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  RumahIbadahRamahAnakRecapitulation  $education
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(RumahIbadahRamahAnakRecapitulation $education): bool
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
     * @return RumahIbadahRamahAnakRecapitulation
     */
    protected function createRumahIbadahRamahAnakRecapitulation(
        array $data = []
        ): RumahIbadahRamahAnakRecapitulation {
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
