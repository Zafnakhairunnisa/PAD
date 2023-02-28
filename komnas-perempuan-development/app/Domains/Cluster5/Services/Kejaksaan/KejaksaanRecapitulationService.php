<?php

namespace App\Domains\Cluster5\Services\Kejaksaan;

use App\Domains\Cluster5\Models\Kejaksaan\KejaksaanRecapitulation;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class KejaksaanRecapitulationService.
 */
class KejaksaanRecapitulationService extends BaseService
{
    private $subjectMessage = 'rekapitulasi Kejaksaan Daerah DIY';

    /**
     * KejaksaanRecapitulationService constructor.
     *
     * @param  KejaksaanRecapitulation  $education
     */
    public function __construct(KejaksaanRecapitulation $education)
    {
        $this->model = $education;
    }

    /**
     * @param  array  $data
     * @return KejaksaanRecapitulation
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): KejaksaanRecapitulation
    {
        DB::beginTransaction();

        try {
            $education = $this->createKejaksaanRecapitulation($data);
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
     * @param  KejaksaanRecapitulation  $education
     * @param  array  $data
     * @return KejaksaanRecapitulation
     *
     * @throws \Throwable
     */
    public function update(
        KejaksaanRecapitulation $education,
        array $data = []
    ): KejaksaanRecapitulation {
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
     * @param  KejaksaanRecapitulation  $education
     * @return KejaksaanRecapitulation
     *
     * @throws GeneralException
     */
    public function delete(
        KejaksaanRecapitulation $education
        ): KejaksaanRecapitulation {
        if ($this->deleteById($education->id)) {
            return $education;
        }

        throw new GeneralException(__('delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  KejaksaanRecapitulation  $education
     * @return KejaksaanRecapitulation
     *
     * @throws GeneralException
     */
    public function restore(
        KejaksaanRecapitulation $education
        ): KejaksaanRecapitulation {
        if ($education->restore()) {
            return $education;
        }

        throw new GeneralException(__('restore_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  KejaksaanRecapitulation  $education
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(KejaksaanRecapitulation $education): bool
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
     * @return KejaksaanRecapitulation
     */
    protected function createKejaksaanRecapitulation(
        array $data = []
        ): KejaksaanRecapitulation {
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
