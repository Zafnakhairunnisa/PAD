<?php

namespace App\Domains\Institutional\Services;

use App\Domains\Institutional\Models\ChildProtectionActivitySourceOfFunds;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class ChildProtectionActivitySourceOfFundsService.
 */
class ChildProtectionActivitySourceOfFundsService extends BaseService
{
    /**
     * ChildProtectionActivitySourceOfFundsService constructor.
     *
     * @param  ChildProtectionActivitySourceOfFunds  $childProtectionActivitySourceOfFunds
     */
    public function __construct(ChildProtectionActivitySourceOfFunds $childProtectionActivitySourceOfFunds)
    {
        $this->model = $childProtectionActivitySourceOfFunds;
    }

    /**
     * @param  array  $data
     * @return ChildProtectionActivitySourceOfFunds
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): ChildProtectionActivitySourceOfFunds
    {
        DB::beginTransaction();

        try {
            $childProtectionActivitySourceOfFunds = $this->createRegulation([
                'name' => $data['name'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat membuat sumber dana kegiatan perlindungan anak. Silahkan coba lagi.'));
        }

        DB::commit();

        return $childProtectionActivitySourceOfFunds;
    }

    /**
     * @param  ChildProtectionActivitySourceOfFunds  $childProtectionActivitySourceOfFunds
     * @param  array  $data
     * @return ChildProtectionActivitySourceOfFunds
     *
     * @throws \Throwable
     */
    public function update(ChildProtectionActivitySourceOfFunds $childProtectionActivitySourceOfFunds, array $data = []): ChildProtectionActivitySourceOfFunds
    {
        DB::beginTransaction();

        try {
            $childProtectionActivitySourceOfFunds->update([
                'name' => $data['name'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat memperbarui sumber dana kegiatan perlindungan anak. Silahkan coba lagi.'));
        }

        DB::commit();

        return $childProtectionActivitySourceOfFunds;
    }

    /**
     * @param  ChildProtectionActivitySourceOfFunds  $childProtectionActivitySourceOfFunds
     * @return ChildProtectionActivitySourceOfFunds
     *
     * @throws GeneralException
     */
    public function delete(ChildProtectionActivitySourceOfFunds $childProtectionActivitySourceOfFunds): ChildProtectionActivitySourceOfFunds
    {
        if ($this->deleteById($childProtectionActivitySourceOfFunds->id)) {
            return $childProtectionActivitySourceOfFunds;
        }

        throw new GeneralException('Terjadi kesalahan saat menghapus sumber dana kegiatan perlindungan anak. Silahkan coba lagi.');
    }

    /**
     * @param  ChildProtectionActivitySourceOfFunds  $childProtectionActivitySourceOfFunds
     * @return ChildProtectionActivitySourceOfFunds
     *
     * @throws GeneralException
     */
    public function restore(ChildProtectionActivitySourceOfFunds $childProtectionActivitySourceOfFunds): ChildProtectionActivitySourceOfFunds
    {
        if ($childProtectionActivitySourceOfFunds->restore()) {
            return $childProtectionActivitySourceOfFunds;
        }

        throw new GeneralException(__('Terjadi kesalahan saat mengembalikan sumber dana kegiatan perlindungan anak. Silahkan coba lagi.'));
    }

    /**
     * @param  ChildProtectionActivitySourceOfFunds  $childProtectionActivitySourceOfFunds
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(ChildProtectionActivitySourceOfFunds $childProtectionActivitySourceOfFunds): bool
    {
        \Storage::deleteDirectory("regulations/{$childProtectionActivitySourceOfFunds->id}");
        if ($childProtectionActivitySourceOfFunds->forceDelete()) {
            // $this->model->images()->delete();
            return true;
        }

        throw new GeneralException(__('Terjadi kesalahan saat menghapus secara permanan sumber dana kegiatan perlindungan anak. Silahkan coba lagi.'));
    }

    /**
     * @param  array  $data
     * @return ChildProtectionActivitySourceOfFunds
     */
    protected function createRegulation(array $data = []): ChildProtectionActivitySourceOfFunds
    {
        return $this->model::create([
            'name' => $data['name'],
        ]);
    }
}
