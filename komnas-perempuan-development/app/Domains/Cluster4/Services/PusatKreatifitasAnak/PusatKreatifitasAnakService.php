<?php

namespace App\Domains\Cluster4\Services\PusatKreatifitasAnak;

use App\Domains\Cluster4\Models\PusatKreatifitasAnak\PusatKreatifitasAnak;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class PusatKreatifitasAnakService.
 */
class PusatKreatifitasAnakService extends BaseService
{
    private $subjectMessage = 'pusat kreatifitas anak';

    /**
     * PusatKreatifitasAnakService constructor.
     *
     * @param  PusatKreatifitasAnak  $pusatKreatifitasAnak
     */
    public function __construct(PusatKreatifitasAnak $pusatKreatifitasAnak)
    {
        $this->model = $pusatKreatifitasAnak;
    }

    /**
     * @param  array  $data
     * @return PusatKreatifitasAnak
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): PusatKreatifitasAnak
    {
        DB::beginTransaction();

        try {
            $pusatKreatifitasAnak = $this->createPusatKreatifitasAnak($data);

            if (isset($data['images'])) {
                $images = $this->uploadFile($data['images'], "pusat-kreatifitas-anak/{$pusatKreatifitasAnak->id}");
                $pusatKreatifitasAnak->images()->createMany($images);
            }

            if (isset($data['documents'])) {
                $documents = $this->uploadFile(
                    $data['documents'],
                    "pusat-kreatifitas-anak/{$pusatKreatifitasAnak->id}",
                    'documents'
                );
                $pusatKreatifitasAnak->images()->createMany($documents);
            }
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('create_error :subject', [
                'subject' => $this->subjectMessage,
            ]));
        }

        DB::commit();

        return $pusatKreatifitasAnak;
    }

    /**
     * @param  PusatKreatifitasAnak  $pusatKreatifitasAnak
     * @param  array  $data
     * @return PusatKreatifitasAnak
     *
     * @throws \Throwable
     */
    public function update(
        PusatKreatifitasAnak $pusatKreatifitasAnak,
        array $data = []
    ): PusatKreatifitasAnak {
        DB::beginTransaction();

        try {
            $pusatKreatifitasAnak->update($this->createData($data));

            if (isset($data['images'])) {
                $images = $this->uploadFile($data['images'], "pusat-kreatifitas-anak/{$pusatKreatifitasAnak->id}");
                $pusatKreatifitasAnak->images()->createMany($images);
            }

            if (isset($data['documents'])) {
                $documents = $this->uploadFile(
                    $data['documents'],
                    "pusat-kreatifitas-anak/{$pusatKreatifitasAnak->id}",
                    'documents'
                );
                $pusatKreatifitasAnak->images()->createMany($documents);
            }
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('update_error :subject', [
                'subject' => $this->subjectMessage,
            ]));
        }

        DB::commit();

        return $pusatKreatifitasAnak;
    }

    /**
     * @param  PusatKreatifitasAnak  $pusatKreatifitasAnak
     * @return PusatKreatifitasAnak
     *
     * @throws GeneralException
     */
    public function delete(
        PusatKreatifitasAnak $pusatKreatifitasAnak
        ): PusatKreatifitasAnak {
        if ($this->deleteById($pusatKreatifitasAnak->id)) {
            return $pusatKreatifitasAnak;
        }

        throw new GeneralException(__('delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  PusatKreatifitasAnak  $pusatKreatifitasAnak
     * @return PusatKreatifitasAnak
     *
     * @throws GeneralException
     */
    public function restore(
        PusatKreatifitasAnak $pusatKreatifitasAnak
        ): PusatKreatifitasAnak {
        if ($pusatKreatifitasAnak->restore()) {
            return $pusatKreatifitasAnak;
        }

        throw new GeneralException(__('restore_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  PusatKreatifitasAnak  $pusatKreatifitasAnak
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(PusatKreatifitasAnak $pusatKreatifitasAnak): bool
    {
        if ($pusatKreatifitasAnak->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('force_delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  array  $data
     * @return PusatKreatifitasAnak
     */
    protected function createPusatKreatifitasAnak(
        array $data = []
        ): PusatKreatifitasAnak {
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
            'bidang' => $data['bidang'] ?? null,
            'alamat' => $data['alamat'] ?? null,
            'kalurahan' => $data['kalurahan'] ?? null,
            'kapanewon' => $data['kapanewon'] ?? null,
            'location_id' => $data['location_id'] ?? null,
            'legalitas' => $data['legalitas'] ?? null,
            'papan_nama' => $data['papan_nama'] ?? null,
            'pelatihan_kha' => $data['pelatihan_kha'] ?? null,
            'kegiatan' => $data['kegiatan'] ?? null,
            'prestasi' => $data['prestasi'] ?? null,
        ];
    }
}
