<?php

namespace App\Domains\Cluster3\Services\Sanitation;

use App\Domains\Cluster3\Models\Sanitation\SanitationRecapitulation;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class SanitationRecapitulationService.
 */
class SanitationRecapitulationService extends BaseService
{
    private $subjectMessage = 'rekapitulasi air bersih dan sanitasi';

    /**
     * SanitationRecapitulationService constructor.
     *
     * @param  SanitationRecapitulation  $sanitation
     */
    public function __construct(SanitationRecapitulation $sanitation)
    {
        $this->model = $sanitation;
    }

    /**
     * @param  array  $data
     * @return SanitationRecapitulation
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): SanitationRecapitulation
    {
        DB::beginTransaction();

        try {
            $sanitation = $this->createSanitationRecapitulation($data);
        } catch (Exception $e) {
            DB::rollBack();
            report($e);

            throw new GeneralException(__('create_error :subject', [
                'subject' => $this->subjectMessage,
            ]));
        }

        DB::commit();

        return $sanitation;
    }

    /**
     * @param  SanitationRecapitulation  $sanitation
     * @param  array  $data
     * @return SanitationRecapitulation
     *
     * @throws \Throwable
     */
    public function update(
        SanitationRecapitulation $sanitation,
        array $data = []
    ): SanitationRecapitulation {
        DB::beginTransaction();

        try {
            $sanitation->update($this->createData($data));
        } catch (Exception $e) {
            DB::rollBack();
            report($e);

            throw new GeneralException(__('update_error :subject', [
                'subject' => $this->subjectMessage,
            ]));
        }

        DB::commit();

        return $sanitation;
    }

    /**
     * @param  SanitationRecapitulation  $sanitation
     * @return SanitationRecapitulation
     *
     * @throws GeneralException
     */
    public function delete(
        SanitationRecapitulation $sanitation
        ): SanitationRecapitulation {
        if ($this->deleteById($sanitation->id)) {
            return $sanitation;
        }

        throw new GeneralException(__('delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  SanitationRecapitulation  $sanitation
     * @return SanitationRecapitulation
     *
     * @throws GeneralException
     */
    public function restore(
        SanitationRecapitulation $sanitation
        ): SanitationRecapitulation {
        if ($sanitation->restore()) {
            return $sanitation;
        }

        throw new GeneralException(__('restore_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  SanitationRecapitulation  $sanitation
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(SanitationRecapitulation $sanitation): bool
    {
        if ($sanitation->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('force_delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  array  $data
     * @return SanitationRecapitulation
     */
    protected function createSanitationRecapitulation(
        array $data = []
        ): SanitationRecapitulation {
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
