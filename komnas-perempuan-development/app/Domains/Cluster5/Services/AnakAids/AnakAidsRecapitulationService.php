<?php

namespace App\Domains\Cluster5\Services\AnakAids;

use App\Domains\Cluster5\Models\AnakAids\AnakAidsRecapitulation;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class AnakAidsRecapitulationService.
 */
class AnakAidsRecapitulationService extends BaseService
{
    private $subjectMessage = 'rekapitulasi anak aids';

    /**
     * AnakAidsRecapitulationService constructor.
     *
     * @param  AnakAidsRecapitulation  $education
     */
    public function __construct(AnakAidsRecapitulation $education)
    {
        $this->model = $education;
    }

    /**
     * @param  array  $data
     * @return AnakAidsRecapitulation
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): AnakAidsRecapitulation
    {
        DB::beginTransaction();

        try {
            $education = $this->createAnakAidsRecapitulation($data);
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
     * @param  AnakAidsRecapitulation  $education
     * @param  array  $data
     * @return AnakAidsRecapitulation
     *
     * @throws \Throwable
     */
    public function update(
        AnakAidsRecapitulation $education,
        array $data = []
    ): AnakAidsRecapitulation {
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
     * @param  AnakAidsRecapitulation  $education
     * @return AnakAidsRecapitulation
     *
     * @throws GeneralException
     */
    public function delete(
        AnakAidsRecapitulation $education
        ): AnakAidsRecapitulation {
        if ($this->deleteById($education->id)) {
            return $education;
        }

        throw new GeneralException(__('delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  AnakAidsRecapitulation  $education
     * @return AnakAidsRecapitulation
     *
     * @throws GeneralException
     */
    public function restore(
        AnakAidsRecapitulation $education
        ): AnakAidsRecapitulation {
        if ($education->restore()) {
            return $education;
        }

        throw new GeneralException(__('restore_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  AnakAidsRecapitulation  $education
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(AnakAidsRecapitulation $education): bool
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
     * @return AnakAidsRecapitulation
     */
    protected function createAnakAidsRecapitulation(
        array $data = []
        ): AnakAidsRecapitulation {
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
