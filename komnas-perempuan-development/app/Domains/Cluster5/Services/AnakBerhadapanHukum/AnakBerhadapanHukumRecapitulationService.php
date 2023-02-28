<?php

namespace App\Domains\Cluster5\Services\AnakBerhadapanHukum;

use App\Domains\Cluster5\Models\AnakBerhadapanHukum\AnakBerhadapanHukumRecapitulation;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class AnakBerhadapanHukumRecapitulationService.
 */
class AnakBerhadapanHukumRecapitulationService extends BaseService
{
    private $subjectMessage = 'rekapitulasi anak berhadapan dengan hukum';

    /**
     * AnakBerhadapanHukumRecapitulationService constructor.
     *
     * @param  AnakBerhadapanHukumRecapitulation  $education
     */
    public function __construct(AnakBerhadapanHukumRecapitulation $education)
    {
        $this->model = $education;
    }

    /**
     * @param  array  $data
     * @return AnakBerhadapanHukumRecapitulation
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): AnakBerhadapanHukumRecapitulation
    {
        DB::beginTransaction();

        try {
            $education = $this->createAnakBerhadapanHukumRecapitulation($data);
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
     * @param  AnakBerhadapanHukumRecapitulation  $education
     * @param  array  $data
     * @return AnakBerhadapanHukumRecapitulation
     *
     * @throws \Throwable
     */
    public function update(
        AnakBerhadapanHukumRecapitulation $education,
        array $data = []
    ): AnakBerhadapanHukumRecapitulation {
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
     * @param  AnakBerhadapanHukumRecapitulation  $education
     * @return AnakBerhadapanHukumRecapitulation
     *
     * @throws GeneralException
     */
    public function delete(
        AnakBerhadapanHukumRecapitulation $education
        ): AnakBerhadapanHukumRecapitulation {
        if ($this->deleteById($education->id)) {
            return $education;
        }

        throw new GeneralException(__('delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  AnakBerhadapanHukumRecapitulation  $education
     * @return AnakBerhadapanHukumRecapitulation
     *
     * @throws GeneralException
     */
    public function restore(
        AnakBerhadapanHukumRecapitulation $education
        ): AnakBerhadapanHukumRecapitulation {
        if ($education->restore()) {
            return $education;
        }

        throw new GeneralException(__('restore_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  AnakBerhadapanHukumRecapitulation  $education
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(AnakBerhadapanHukumRecapitulation $education): bool
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
     * @return AnakBerhadapanHukumRecapitulation
     */
    protected function createAnakBerhadapanHukumRecapitulation(
        array $data = []
        ): AnakBerhadapanHukumRecapitulation {
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
