<?php

namespace App\Domains\Cluster5\Services\PolisiDiy;

use App\Domains\Cluster5\Models\PolisiDiy\PolisiDiy;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class PolisiDiyService.
 */
class PolisiDiyService extends BaseService
{
    private $subjectMessage = 'Polisi Daerah DIY';

    /**
     * PolisiDiyService constructor.
     *
     * @param  PolisiDiy  $PolisiDiy
     */
    public function __construct(PolisiDiy $polisi_diy)
    {
        $this->model = $polisi_diy;
    }

    /**
     * @param  array  $data
     * @return PolisiDiy
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): PolisiDiy
    {
        DB::beginTransaction();

        try {
            $polisi_diy = $this->createPolisiDiy($data);

            if (isset($data['images'])) {
                $images = $this->uploadFile($data['images'], "polisi_diy/{$polisi_diy->id}");
                $polisi_diy->images()->createMany($images);
            }

            if (isset($data['documents'])) {
                $documents = $this->uploadFile(
                    $data['documents'],
                    "polisi_diy/{$polisi_diy->id}",
                    'documents'
                );
                $polisi_diy->images()->createMany($documents);
            }
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('create_error :subject', [
                'subject' => $this->subjectMessage,
            ]));
        }

        DB::commit();

        return $polisi_diy;
    }

    /**
     * @param  PolisiDiy  $polisi_diy
     * @param  array  $data
     * @return PolisiDiy
     *
     * @throws \Throwable
     */
    public function update(
        PolisiDiy $polisi_diy,
        array $data = []
    ): PolisiDiy {
        DB::beginTransaction();

        try {
            $polisi_diy->update($this->createData($data));

            if (isset($data['images'])) {
                $images = $this->uploadFile($data['images'], "polisi_diy/{$polisi_diy->id}");
                $polisi_diy->images()->createMany($images);
            }

            if (isset($data['documents'])) {
                $documents = $this->uploadFile(
                    $data['documents'],
                    "polisi_diy/{$polisi_diy->id}",
                    'documents'
                );
                $polisi_diy->images()->createMany($documents);
            }
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('update_error :subject', [
                'subject' => $this->subjectMessage,
            ]));
        }

        DB::commit();

        return $polisi_diy;
    }

    /**
     * @param  PolisiDiy  $polisi_diy
     * @return PolisiDiy
     *
     * @throws GeneralException
     */
    public function delete(
        PolisiDiy $polisi_diy
        ): PolisiDiy {
        if ($this->deleteById($polisi_diy->id)) {
            return $polisi_diy;
        }

        throw new GeneralException(__('delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  PolisiDiy  $polisi_diy
     * @return PolisiDiy
     *
     * @throws GeneralException
     */
    public function restore(
        PolisiDiy $polisi_diy
        ): PolisiDiy {
        if ($polisi_diy->restore()) {
            return $polisi_diy;
        }

        throw new GeneralException(__('restore_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  PolisiDiy  $polisi_diy
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(PolisiDiy $polisi_diy): bool
    {
        if ($polisi_diy->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('force_delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  array  $data
     * @return PolisiDiy
     */
    protected function createPolisiDiy(
        array $data = []
        ): PolisiDiy {
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
