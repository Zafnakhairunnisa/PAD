<?php

namespace App\Domains\Institutional\Services\Kapanewon;

use App\Domains\Institutional\Models\Kapanewon\KapanewonRecapitulation;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class KapanewonRecapitulationService.
 */
class KapanewonRecapitulationService extends BaseService
{
    private $subjectMessage = 'rekapitulasi Kapanewon';

    /**
     * KapanewonRecapitulationService constructor.
     *
     * @param  KapanewonRecapitulation  $kapanewon
     */
    public function __construct(KapanewonRecapitulation $kapanewon)
    {
        $this->model = $kapanewon;
    }

    /**
     * @param  array  $data
     * @return KapanewonRecapitulation
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): KapanewonRecapitulation
    {
        DB::beginTransaction();

        try {
            $kapanewon = $this->createKapanewonRecapitulation($data);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('create_error :subject', [
                'subject' => $this->subjectMessage,
            ]));
        }

        DB::commit();

        return $kapanewon;
    }

    /**
     * @param  KapanewonRecapitulation  $kapanewon
     * @param  array  $data
     * @return KapanewonRecapitulation
     *
     * @throws \Throwable
     */
    public function update(
        KapanewonRecapitulation $kapanewon,
        array $data = []
    ): KapanewonRecapitulation {
        DB::beginTransaction();

        try {
            $kapanewon->update($this->createData($data));
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('update_error :subject', [
                'subject' => $this->subjectMessage,
            ]));
        }

        DB::commit();

        return $kapanewon;
    }

    /**
     * @param  KapanewonRecapitulation  $kapanewon
     * @return KapanewonRecapitulation
     *
     * @throws GeneralException
     */
    public function delete(
        KapanewonRecapitulation $kapanewon
        ): KapanewonRecapitulation {
        if ($this->deleteById($kapanewon->id)) {
            return $kapanewon;
        }

        throw new GeneralException(__('delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  KapanewonRecapitulation  $kapanewon
     * @return KapanewonRecapitulation
     *
     * @throws GeneralException
     */
    public function restore(
        KapanewonRecapitulation $kapanewon
        ): KapanewonRecapitulation {
        if ($kapanewon->restore()) {
            return $kapanewon;
        }

        throw new GeneralException(__('restore_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  KapanewonRecapitulation  $kapanewon
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(KapanewonRecapitulation $kapanewon): bool
    {
        if ($kapanewon->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('force_delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  array  $data
     * @return KapanewonRecapitulation
     */
    protected function createKapanewonRecapitulation(
        array $data = []
        ): KapanewonRecapitulation {
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
