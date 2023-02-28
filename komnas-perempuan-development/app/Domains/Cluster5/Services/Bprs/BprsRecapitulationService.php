<?php

namespace App\Domains\Cluster5\Services\Bprs;

use App\Domains\Cluster5\Models\Bprs\BprsRecapitulation;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class BprsRecapitulationService.
 */
class BprsRecapitulationService extends BaseService
{
    private $subjectMessage = 'rekapitulasi balai perlindungan dan rehabilitasi sosial remaja (BPRSR) DIY';

    /**
     * BprsRecapitulationService constructor.
     *
     * @param  BprsRecapitulation  $education
     */
    public function __construct(BprsRecapitulation $education)
    {
        $this->model = $education;
    }

    /**
     * @param  array  $data
     * @return BprsRecapitulation
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): BprsRecapitulation
    {
        DB::beginTransaction();

        try {
            $education = $this->createBprsRecapitulation($data);
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
     * @param  BprsRecapitulation  $education
     * @param  array  $data
     * @return BprsRecapitulation
     *
     * @throws \Throwable
     */
    public function update(
        BprsRecapitulation $education,
        array $data = []
    ): BprsRecapitulation {
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
     * @param  BprsRecapitulation  $education
     * @return BprsRecapitulation
     *
     * @throws GeneralException
     */
    public function delete(
        BprsRecapitulation $education
        ): BprsRecapitulation {
        if ($this->deleteById($education->id)) {
            return $education;
        }

        throw new GeneralException(__('delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  BprsRecapitulation  $education
     * @return BprsRecapitulation
     *
     * @throws GeneralException
     */
    public function restore(
        BprsRecapitulation $education
        ): BprsRecapitulation {
        if ($education->restore()) {
            return $education;
        }

        throw new GeneralException(__('restore_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  BprsRecapitulation  $education
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(BprsRecapitulation $education): bool
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
     * @return BprsRecapitulation
     */
    protected function createBprsRecapitulation(
        array $data = []
        ): BprsRecapitulation {
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
