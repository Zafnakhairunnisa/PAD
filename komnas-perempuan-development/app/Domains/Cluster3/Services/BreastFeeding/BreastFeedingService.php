<?php

namespace App\Domains\Cluster3\Services\BreastFeeding;

use App\Domains\Cluster3\Models\BreastFeeding\BreastFeeding;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class BreastFeedingService.
 */
class BreastFeedingService extends BaseService
{
    private $subjectMessage = 'pemberian air susu ibu';

    /**
     * BreastFeedingService constructor.
     *
     * @param  BreastFeeding  $breastFeeding
     */
    public function __construct(BreastFeeding $breastFeeding)
    {
        $this->model = $breastFeeding;
    }

    /**
     * @param  array  $data
     * @return BreastFeeding
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): BreastFeeding
    {
        DB::beginTransaction();

        try {
            $breastFeeding = $this->createBreastFeeding($data);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('create_error :subject', [
                'subject' => $this->subjectMessage,
            ]));
        }

        DB::commit();

        return $breastFeeding;
    }

    /**
     * @param  BreastFeeding  $breastFeeding
     * @param  array  $data
     * @return BreastFeeding
     *
     * @throws \Throwable
     */
    public function update(
        BreastFeeding $breastFeeding,
        array $data = []
    ): BreastFeeding {
        DB::beginTransaction();

        try {
            $breastFeeding->update($this->createData($data));
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('update_error :subject', [
                'subject' => $this->subjectMessage,
            ]));
        }

        DB::commit();

        return $breastFeeding;
    }

    /**
     * @param  BreastFeeding  $breastFeeding
     * @return BreastFeeding
     *
     * @throws GeneralException
     */
    public function delete(
        BreastFeeding $breastFeeding
        ): BreastFeeding {
        if ($this->deleteById($breastFeeding->id)) {
            return $breastFeeding;
        }

        throw new GeneralException(__('delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  BreastFeeding  $breastFeeding
     * @return BreastFeeding
     *
     * @throws GeneralException
     */
    public function restore(
        BreastFeeding $breastFeeding
        ): BreastFeeding {
        if ($breastFeeding->restore()) {
            return $breastFeeding;
        }

        throw new GeneralException(__('restore_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  BreastFeeding  $breastFeeding
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(BreastFeeding $breastFeeding): bool
    {
        if ($breastFeeding->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('force_delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  array  $data
     * @return BreastFeeding
     */
    protected function createBreastFeeding(
        array $data = []
        ): BreastFeeding {
        return $this->model::create($this->createData($data));
    }

    /**
     * @param  array  $data
     * @return array
     */
    private function createData(array $data = []): array
    {
        return [
            'nama' => $data['nama'] ?? null,
            'no_telepon' => $data['no_telepon'] ?? null,
            'lembaga' => $data['lembaga'] ?? null,
        ];
    }
}
