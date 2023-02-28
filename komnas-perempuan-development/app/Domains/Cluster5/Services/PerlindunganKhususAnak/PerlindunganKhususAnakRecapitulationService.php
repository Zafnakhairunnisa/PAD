<?php

namespace App\Domains\Cluster5\Services\PerlindunganKhususAnak;

use App\Domains\Cluster5\Models\PerlindunganKhususAnak\PerlindunganKhususAnakRecapitulation;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class PerlindunganKhususAnakRecapitulationService.
 */
class PerlindunganKhususAnakRecapitulationService extends BaseService
{
    private $subjectMessage = 'rekapitulasi perlindungan khusus anak';

    /**
     * PerlindunganKhususAnakRecapitulationService constructor.
     *
     * @param  PerlindunganKhususAnakRecapitulation  $education
     */
    public function __construct(PerlindunganKhususAnakRecapitulation $education)
    {
        $this->model = $education;
    }

    /**
     * @param  array  $data
     * @return PerlindunganKhususAnakRecapitulation
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): PerlindunganKhususAnakRecapitulation
    {
        DB::beginTransaction();

        try {
            $education = $this->createPerlindunganKhususAnakRecapitulation($data);
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
     * @param  PerlindunganKhususAnakRecapitulation  $education
     * @param  array  $data
     * @return PerlindunganKhususAnakRecapitulation
     *
     * @throws \Throwable
     */
    public function update(
        PerlindunganKhususAnakRecapitulation $education,
        array $data = []
    ): PerlindunganKhususAnakRecapitulation {
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
     * @param  PerlindunganKhususAnakRecapitulation  $education
     * @return PerlindunganKhususAnakRecapitulation
     *
     * @throws GeneralException
     */
    public function delete(
        PerlindunganKhususAnakRecapitulation $education
        ): PerlindunganKhususAnakRecapitulation {
        if ($this->deleteById($education->id)) {
            return $education;
        }

        throw new GeneralException(__('delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  PerlindunganKhususAnakRecapitulation  $education
     * @return PerlindunganKhususAnakRecapitulation
     *
     * @throws GeneralException
     */
    public function restore(
        PerlindunganKhususAnakRecapitulation $education
        ): PerlindunganKhususAnakRecapitulation {
        if ($education->restore()) {
            return $education;
        }

        throw new GeneralException(__('restore_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  PerlindunganKhususAnakRecapitulation  $education
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(PerlindunganKhususAnakRecapitulation $education): bool
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
     * @return PerlindunganKhususAnakRecapitulation
     */
    protected function createPerlindunganKhususAnakRecapitulation(
        array $data = []
        ): PerlindunganKhususAnakRecapitulation {
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
