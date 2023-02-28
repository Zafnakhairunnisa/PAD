<?php

namespace App\Domains\Cluster5\Services\Peksos;

use App\Domains\Cluster5\Models\Peksos\Peksos;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class PeksosService.
 */
class PeksosService extends BaseService
{
    private $subjectMessage = 'Pekerja Sosial';

    /**
     * PeksosService constructor.
     *
     * @param  Peksos  $Peksos
     */
    public function __construct(Peksos $peksos)
    {
        $this->model = $peksos;
    }

    /**
     * @param  array  $data
     * @return Peksos
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Peksos
    {
        DB::beginTransaction();

        try {
            $peksos = $this->createPeksos($data);

            if (isset($data['images'])) {
                $images = $this->uploadFile($data['images'], "peksos/{$peksos->id}");
                $peksos->images()->createMany($images);
            }

            if (isset($data['documents'])) {
                $documents = $this->uploadFile(
                    $data['documents'],
                    "peksos/{$peksos->id}",
                    'documents'
                );
                $peksos->images()->createMany($documents);
            }
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('create_error :subject', [
                'subject' => $this->subjectMessage,
            ]));
        }

        DB::commit();

        return $peksos;
    }

    /**
     * @param  Peksos  $peksos
     * @param  array  $data
     * @return Peksos
     *
     * @throws \Throwable
     */
    public function update(
        Peksos $peksos,
        array $data = []
    ): Peksos {
        DB::beginTransaction();

        try {
            $peksos->update($this->createData($data));

            if (isset($data['images'])) {
                $images = $this->uploadFile($data['images'], "peksos/{$peksos->id}");
                $peksos->images()->createMany($images);
            }

            if (isset($data['documents'])) {
                $documents = $this->uploadFile(
                    $data['documents'],
                    "peksos/{$peksos->id}",
                    'documents'
                );
                $peksos->images()->createMany($documents);
            }
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('update_error :subject', [
                'subject' => $this->subjectMessage,
            ]));
        }

        DB::commit();

        return $peksos;
    }

    /**
     * @param  Peksos  $peksos
     * @return Peksos
     *
     * @throws GeneralException
     */
    public function delete(
        Peksos $peksos
        ): Peksos {
        if ($this->deleteById($peksos->id)) {
            return $peksos;
        }

        throw new GeneralException(__('delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  Peksos  $peksos
     * @return Peksos
     *
     * @throws GeneralException
     */
    public function restore(
        Peksos $peksos
        ): Peksos {
        if ($peksos->restore()) {
            return $peksos;
        }

        throw new GeneralException(__('restore_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  Peksos  $peksos
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(Peksos $peksos): bool
    {
        if ($peksos->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('force_delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  array  $data
     * @return Peksos
     */
    protected function createPeksos(
        array $data = []
        ): Peksos {
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
