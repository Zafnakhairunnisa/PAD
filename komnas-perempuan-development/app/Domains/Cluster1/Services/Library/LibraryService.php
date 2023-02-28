<?php

namespace App\Domains\Cluster1\Services\Library;

use App\Domains\Cluster1\Models\Library;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class LibraryService.
 */
class LibraryService extends BaseService
{
    /**
     * LibraryService constructor.
     *
     * @param  Library  $Library
     */
    public function __construct(Library $Library)
    {
        $this->model = $Library;
    }

    /**
     * @param  array  $data
     * @return Library
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Library
    {
        DB::beginTransaction();

        try {
            $Library = $this->createLibrary([
                'name' => $data['name'],
                'value' => $data['value'],
                'year' => $data['year'],
                'parent_id' => $data['parent_id']
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat membuat perpustakaan dan taman bacaan. Silahkan coba lagi.'));
        }

        DB::commit();

        return $Library;
    }

    /**
     * @param  Library  $Library
     * @param  array  $data
     * @return Library
     *
     * @throws \Throwable
     */
    public function update(Library $Library, array $data = []): Library
    {
        DB::beginTransaction();

        try {
            $Library->update([
                'name' => $data['name'],
                'value' => $data['value'],
                'year' => $data['year'],
                'parent_id' => $data['parent_id']
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat memperbarui perpustakaan dan taman bacaan. Silahkan coba lagi.'));
        }

        DB::commit();

        return $Library;
    }

    /**
     * @param  Library  $Library
     * @return Library
     *
     * @throws GeneralException
     */
    public function delete(Library $Library): Library
    {
        if ($this->deleteById($Library->id)) {
            return $Library;
        }

        throw new GeneralException('Terjadi kesalahan saat menghapus perpustakaan dan taman bacaan. Silahkan coba lagi.');
    }

    /**
     * @param  Library  $Library
     * @return Library
     *
     * @throws GeneralException
     */
    public function restore(Library $Library): Library
    {
        if ($Library->restore()) {
            return $Library;
        }

        throw new GeneralException(__('Terjadi kesalahan saat mengembalikan perpustakaan dan taman bacaan. Silahkan coba lagi.'));
    }

    /**
     * @param  Library  $Library
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(Library $Library): bool
    {
        if ($Library->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('Terjadi kesalahan saat menghapus secara permanan perpustakaan dan taman bacaan. Silahkan coba lagi.'));
    }

    /**
     * @param  array  $data
     * @return Library
     */
    protected function createLibrary(array $data = []): Library
    {
        return $this->model::create([
            'name' => $data['name'] ?? null,
            'value' => $data['value'] ?? null,
            'year' => $data['year'] ?? null,
            'parent_id' => $data['parent_id'] ?? null
        ]);
    }
}
