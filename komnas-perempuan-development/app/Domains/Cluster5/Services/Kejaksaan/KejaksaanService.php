<?php

namespace App\Domains\Cluster5\Services\Kejaksaan;

use App\Domains\Cluster5\Models\Kejaksaan\Kejaksaan;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class KejaksaanService.
 */
class KejaksaanService extends BaseService
{
    private $subjectMessage = 'Kejaksaan Daerah DIY';

    /**
     * KejaksaanService constructor.
     *
     * @param  Kejaksaan  $Kejaksaan
     */
    public function __construct(Kejaksaan $kejaksaan)
    {
        $this->model = $kejaksaan;
    }

    /**
     * @param  array  $data
     * @return Kejaksaan
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Kejaksaan
    {
        DB::beginTransaction();

        try {
            $kejaksaan = $this->createKejaksaan($data);

            if (isset($data['images'])) {
                $images = $this->uploadFile($data['images'], "kejaksaan/{$kejaksaan->id}");
                $kejaksaan->images()->createMany($images);
            }

            if (isset($data['documents'])) {
                $documents = $this->uploadFile(
                    $data['documents'],
                    "kejaksaan/{$kejaksaan->id}",
                    'documents'
                );
                $kejaksaan->images()->createMany($documents);
            }
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('create_error :subject', [
                'subject' => $this->subjectMessage,
            ]));
        }

        DB::commit();

        return $kejaksaan;
    }

    /**
     * @param  Kejaksaan  $kejaksaan
     * @param  array  $data
     * @return Kejaksaan
     *
     * @throws \Throwable
     */
    public function update(
        Kejaksaan $kejaksaan,
        array $data = []
    ): Kejaksaan {
        DB::beginTransaction();

        try {
            $kejaksaan->update($this->createData($data));

            if (isset($data['images'])) {
                $images = $this->uploadFile($data['images'], "kejaksaan/{$kejaksaan->id}");
                $kejaksaan->images()->createMany($images);
            }

            if (isset($data['documents'])) {
                $documents = $this->uploadFile(
                    $data['documents'],
                    "kejaksaan/{$kejaksaan->id}",
                    'documents'
                );
                $kejaksaan->images()->createMany($documents);
            }
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('update_error :subject', [
                'subject' => $this->subjectMessage,
            ]));
        }

        DB::commit();

        return $kejaksaan;
    }

    /**
     * @param  Kejaksaan  $kejaksaan
     * @return Kejaksaan
     *
     * @throws GeneralException
     */
    public function delete(
        Kejaksaan $kejaksaan
        ): Kejaksaan {
        if ($this->deleteById($kejaksaan->id)) {
            return $kejaksaan;
        }

        throw new GeneralException(__('delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  Kejaksaan  $kejaksaan
     * @return Kejaksaan
     *
     * @throws GeneralException
     */
    public function restore(
        Kejaksaan $kejaksaan
        ): Kejaksaan {
        if ($kejaksaan->restore()) {
            return $kejaksaan;
        }

        throw new GeneralException(__('restore_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  Kejaksaan  $kejaksaan
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(Kejaksaan $kejaksaan): bool
    {
        if ($kejaksaan->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('force_delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  array  $data
     * @return Kejaksaan
     */
    protected function createKejaksaan(
        array $data = []
        ): Kejaksaan {
        return $this->model::create($this->createData($data));
    }

    /**
     * @param  array  $data
     * @return array
     */
    private function createData(array $data = []): array
    {
        return [
            'alamat' => $data['alamat'] ?? null,
            'daftar_sop' => $data['daftar_sop'] ?? null,
            'fasilitas' => $data['fasilitas'] ?? null,
        ];
    }
}
