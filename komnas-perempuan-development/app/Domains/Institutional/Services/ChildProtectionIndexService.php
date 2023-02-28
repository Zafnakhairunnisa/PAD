<?php

namespace App\Domains\Institutional\Services;

use App\Domains\Institutional\Models\ChildProtectionIndex;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class ChildProtectionIndexService.
 */
class ChildProtectionIndexService extends BaseService
{
    /**
     * ChildProtectionIndexService constructor.
     *
     * @param  ChildProtectionIndex  $childProtectionIndex
     */
    public function __construct(ChildProtectionIndex $childProtectionIndex)
    {
        $this->model = $childProtectionIndex;
    }

    /**
     * @param  array  $data
     * @return ChildProtectionIndex
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): ChildProtectionIndex
    {
        DB::beginTransaction();

        try {
            $childProtectionIndex = $this->createRegulation([
                'category' => $data['category'],
                'year' => $data['year'],
                'value' => $data['value'],
                'rank' => $data['rank'],
                'location_id' => $data['location_id'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat membuat indeks perlindungan anaklahkan coba lagi.'));
        }

        DB::commit();

        return $childProtectionIndex;
    }

    /**
     * @param  ChildProtectionIndex  $childProtectionIndex
     * @param  array  $data
     * @return ChildProtectionIndex
     *
     * @throws \Throwable
     */
    public function update(ChildProtectionIndex $childProtectionIndex, array $data = []): ChildProtectionIndex
    {
        DB::beginTransaction();

        try {
            $childProtectionIndex->update([
                'category' => $data['category'],
                'year' => $data['year'],
                'value' => $data['value'],
                'rank' => $data['rank'],
                'location_id' => $data['location_id'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat memperbarui indeks perlindungan anak. Silahkan coba lagi.'));
        }

        DB::commit();

        return $childProtectionIndex;
    }

    /**
     * @param  ChildProtectionIndex  $childProtectionIndex
     * @return ChildProtectionIndex
     *
     * @throws GeneralException
     */
    public function delete(ChildProtectionIndex $childProtectionIndex): ChildProtectionIndex
    {
        if ($this->deleteById($childProtectionIndex->id)) {
            return $childProtectionIndex;
        }

        throw new GeneralException('Terjadi kesalahan saat menghapus indeks perlindungan anak. Silahkan coba lagi.');
    }

    /**
     * @param  ChildProtectionIndex  $childProtectionIndex
     * @return ChildProtectionIndex
     *
     * @throws GeneralException
     */
    public function restore(ChildProtectionIndex $childProtectionIndex): ChildProtectionIndex
    {
        if ($childProtectionIndex->restore()) {
            return $childProtectionIndex;
        }

        throw new GeneralException(__('Terjadi kesalahan saat mengembalikan indeks perlindungan anak. Silahkan coba lagi.'));
    }

    /**
     * @param  ChildProtectionIndex  $childProtectionIndex
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(ChildProtectionIndex $childProtectionIndex): bool
    {
        \Storage::deleteDirectory("regulations/{$childProtectionIndex->id}");
        if ($childProtectionIndex->forceDelete()) {
            // $this->model->images()->delete();
            return true;
        }

        throw new GeneralException(__('Terjadi kesalahan saat menghapus secara permanan indeks perlindungan anak. Silahkan coba lagi.'));
    }

    /**
     * @param  array  $data
     * @return ChildProtectionIndex
     */
    protected function createRegulation(array $data = []): ChildProtectionIndex
    {
        return $this->model::create([
            'category' => $data['category'],
            'year' => $data['year'],
            'value' => $data['value'],
            'rank' => $data['rank'],
            'location_id' => $data['location_id'],
        ]);
    }
}
