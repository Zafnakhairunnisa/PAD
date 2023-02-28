<?php

namespace App\Domains\Cluster5\Services\Lpka;

use App\Domains\Cluster5\Models\Lpka\LpkaRecapitulation;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class LpkaRecapitulationService.
 */
class LpkaRecapitulationService extends BaseService
{
    private $subjectMessage = 'rekapitulasi Lembaga Pembinaan Khusus Anak Yogyakarta';

    /**
     * LpkaRecapitulationService constructor.
     *
     * @param  LpkaRecapitulation  $education
     */
    public function __construct(LpkaRecapitulation $education)
    {
        $this->model = $education;
    }

    /**
     * @param  array  $data
     * @return LpkaRecapitulation
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): LpkaRecapitulation
    {
        DB::beginTransaction();

        try {
            $education = $this->createLpkaRecapitulation($data);
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
     * @param  LpkaRecapitulation  $education
     * @param  array  $data
     * @return LpkaRecapitulation
     *
     * @throws \Throwable
     */
    public function update(
        LpkaRecapitulation $education,
        array $data = []
    ): LpkaRecapitulation {
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
     * @param  LpkaRecapitulation  $education
     * @return LpkaRecapitulation
     *
     * @throws GeneralException
     */
    public function delete(
        LpkaRecapitulation $education
        ): LpkaRecapitulation {
        if ($this->deleteById($education->id)) {
            return $education;
        }

        throw new GeneralException(__('delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  LpkaRecapitulation  $education
     * @return LpkaRecapitulation
     *
     * @throws GeneralException
     */
    public function restore(
        LpkaRecapitulation $education
        ): LpkaRecapitulation {
        if ($education->restore()) {
            return $education;
        }

        throw new GeneralException(__('restore_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  LpkaRecapitulation  $education
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(LpkaRecapitulation $education): bool
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
     * @return LpkaRecapitulation
     */
    protected function createLpkaRecapitulation(
        array $data = []
        ): LpkaRecapitulation {
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
