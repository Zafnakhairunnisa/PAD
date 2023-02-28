<?php

namespace App\Domains\Institutional\Services\ChildForum;

use App\Domains\Institutional\Models\ChildForumRecapitulation;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class ChildForumRecapitulationService.
 */
class ChildForumRecapitulationService extends BaseService
{
    /**
     * ChildForumRecapitulationService constructor.
     *
     * @param  ChildForumRecapitulation  $recapitulation
     */
    public function __construct(ChildForumRecapitulation $recapitulation)
    {
        $this->model = $recapitulation;
    }

    /**
     * @param  array  $data
     * @return ChildForumRecapitulation
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): ChildForumRecapitulation
    {
        DB::beginTransaction();

        try {
            $recapitulation = $this->createChildProtectionActivity([
                'value_diy' => $data['value_diy'],
                'value_kabupaten' => $data['value_kabupaten'],
                'value_kapanewon' => $data['value_kapanewon'],
                'value_kalurahan' => $data['value_kalurahan'],
                'year' => $data['year'],
                'location_id' => $data['location_id'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat membuat rekapitulasi forum anak. Silahkan coba lagi.'));
        }

        DB::commit();

        return $recapitulation;
    }

    /**
     * @param  ChildForumRecapitulation  $recapitulation
     * @param  array  $data
     * @return ChildForumRecapitulation
     *
     * @throws \Throwable
     */
    public function update(ChildForumRecapitulation $recapitulation, array $data = []): ChildForumRecapitulation
    {
        DB::beginTransaction();

        try {
            $recapitulation->update([
                'value_diy' => $data['value_diy'],
                'value_kabupaten' => $data['value_kabupaten'],
                'value_kapanewon' => $data['value_kapanewon'],
                'value_kalurahan' => $data['value_kalurahan'],
                'year' => $data['year'],
                'location_id' => $data['location_id'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat memperbarui rekapitulasi forum anak. Silahkan coba lagi.'));
        }

        DB::commit();

        return $recapitulation;
    }

    /**
     * @param  ChildForumRecapitulation  $recapitulation
     * @return ChildForumRecapitulation
     *
     * @throws GeneralException
     */
    public function delete(ChildForumRecapitulation $recapitulation): ChildForumRecapitulation
    {
        if ($this->deleteById($recapitulation->id)) {
            return $recapitulation;
        }

        throw new GeneralException('Terjadi kesalahan saat menghapus rekapitulasi forum anak. Silahkan coba lagi.');
    }

    /**
     * @param  ChildForumRecapitulation  $recapitulation
     * @return ChildForumRecapitulation
     *
     * @throws GeneralException
     */
    public function restore(ChildForumRecapitulation $recapitulation): ChildForumRecapitulation
    {
        if ($recapitulation->restore()) {
            return $recapitulation;
        }

        throw new GeneralException(__('Terjadi kesalahan saat mengembalikan rekapitulasi forum anak. Silahkan coba lagi.'));
    }

    /**
     * @param  ChildForumRecapitulation  $recapitulation
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(ChildForumRecapitulation $recapitulation): bool
    {
        if ($recapitulation->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('Terjadi kesalahan saat menghapus secara permanen rekapitulasi forum anak. Silahkan coba lagi.'));
    }

    /**
     * @param  array  $data
     * @return ChildForumRecapitulation
     */
    protected function createChildProtectionActivity(array $data = []): ChildForumRecapitulation
    {
        return $this->model::create([
            'value_diy' => $data['value_diy'] ?? null,
            'value_kabupaten' => $data['value_kabupaten'] ?? null,
            'value_kapanewon' => $data['value_kapanewon'] ?? null,
            'value_kalurahan' => $data['value_kalurahan'] ?? null,
            'year' => $data['year'] ?? null,
            'location_id' => $data['location_id'] ?? null,
        ]);
    }
}
