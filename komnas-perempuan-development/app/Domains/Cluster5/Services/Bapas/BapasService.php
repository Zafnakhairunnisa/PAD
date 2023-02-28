<?php

namespace App\Domains\Cluster5\Services\Bapas;

use App\Domains\Cluster5\Models\Bapas\Bapas;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class BapasService.
 */
class BapasService extends BaseService
{
    private $subjectMessage = 'Balai Pemasyarakatan DIY';

    /**
     * BapasService constructor.
     *
     * @param  Bapas  $Bapas
     */
    public function __construct(Bapas $bapas)
    {
        $this->model = $bapas;
    }

    /**
     * @param  array  $data
     * @return Bapas
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Bapas
    {
        DB::beginTransaction();

        try {
            $bapas = $this->createBapas($data);

            if (isset($data['images'])) {
                $images = $this->uploadFile($data['images'], "bapas/{$bapas->id}");
                $bapas->images()->createMany($images);
            }

            if (isset($data['documents'])) {
                $documents = $this->uploadFile(
                    $data['documents'],
                    "bapas/{$bapas->id}",
                    'documents'
                );
                $bapas->images()->createMany($documents);
            }
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('create_error :subject', [
                'subject' => $this->subjectMessage,
            ]));
        }

        DB::commit();

        return $bapas;
    }

    /**
     * @param  Bapas  $bapas
     * @param  array  $data
     * @return Bapas
     *
     * @throws \Throwable
     */
    public function update(
        Bapas $bapas,
        array $data = []
    ): Bapas {
        DB::beginTransaction();

        try {
            $bapas->update($this->createData($data));

            if (isset($data['images'])) {
                $images = $this->uploadFile($data['images'], "bapas/{$bapas->id}");
                $bapas->images()->createMany($images);
            }

            if (isset($data['documents'])) {
                $documents = $this->uploadFile(
                    $data['documents'],
                    "bapas/{$bapas->id}",
                    'documents'
                );
                $bapas->images()->createMany($documents);
            }
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('update_error :subject', [
                'subject' => $this->subjectMessage,
            ]));
        }

        DB::commit();

        return $bapas;
    }

    /**
     * @param  Bapas  $bapas
     * @return Bapas
     *
     * @throws GeneralException
     */
    public function delete(
        Bapas $bapas
        ): Bapas {
        if ($this->deleteById($bapas->id)) {
            return $bapas;
        }

        throw new GeneralException(__('delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  Bapas  $bapas
     * @return Bapas
     *
     * @throws GeneralException
     */
    public function restore(
        Bapas $bapas
        ): Bapas {
        if ($bapas->restore()) {
            return $bapas;
        }

        throw new GeneralException(__('restore_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  Bapas  $bapas
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(Bapas $bapas): bool
    {
        if ($bapas->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('force_delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  array  $data
     * @return Bapas
     */
    protected function createBapas(
        array $data = []
        ): Bapas {
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
