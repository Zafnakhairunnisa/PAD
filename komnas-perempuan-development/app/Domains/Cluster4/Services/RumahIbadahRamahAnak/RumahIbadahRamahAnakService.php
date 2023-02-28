<?php

namespace App\Domains\Cluster4\Services\RumahIbadahRamahAnak;

use App\Domains\Cluster4\Models\RumahIbadahRamahAnak\RumahIbadahRamahAnak;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class RumahIbadahRamahAnakService.
 */
class RumahIbadahRamahAnakService extends BaseService
{
    private $subjectMessage = 'rumah ibadah ramah anak';

    /**
     * RumahIbadahRamahAnakService constructor.
     *
     * @param  RumahIbadahRamahAnak  $pusatKreatifitasAnak
     */
    public function __construct(RumahIbadahRamahAnak $pusatKreatifitasAnak)
    {
        $this->model = $pusatKreatifitasAnak;
    }

    /**
     * @param  array  $data
     * @return RumahIbadahRamahAnak
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): RumahIbadahRamahAnak
    {
        DB::beginTransaction();

        try {
            $pusatKreatifitasAnak = $this->createRumahIbadahRamahAnak($data);

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
     * @param  RumahIbadahRamahAnak  $pusatKreatifitasAnak
     * @param  array  $data
     * @return RumahIbadahRamahAnak
     *
     * @throws \Throwable
     */
    public function update(
        RumahIbadahRamahAnak $pusatKreatifitasAnak,
        array $data = []
    ): RumahIbadahRamahAnak {
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
     * @param  RumahIbadahRamahAnak  $pusatKreatifitasAnak
     * @return RumahIbadahRamahAnak
     *
     * @throws GeneralException
     */
    public function delete(
        RumahIbadahRamahAnak $pusatKreatifitasAnak
        ): RumahIbadahRamahAnak {
        if ($this->deleteById($pusatKreatifitasAnak->id)) {
            return $pusatKreatifitasAnak;
        }

        throw new GeneralException(__('delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  RumahIbadahRamahAnak  $pusatKreatifitasAnak
     * @return RumahIbadahRamahAnak
     *
     * @throws GeneralException
     */
    public function restore(
        RumahIbadahRamahAnak $pusatKreatifitasAnak
        ): RumahIbadahRamahAnak {
        if ($pusatKreatifitasAnak->restore()) {
            return $pusatKreatifitasAnak;
        }

        throw new GeneralException(__('restore_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  RumahIbadahRamahAnak  $pusatKreatifitasAnak
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(RumahIbadahRamahAnak $pusatKreatifitasAnak): bool
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
     * @return RumahIbadahRamahAnak
     */
    protected function createRumahIbadahRamahAnak(
        array $data = []
        ): RumahIbadahRamahAnak {
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
            'jenis' => $data['jenis'] ?? null,
            'alamat' => $data['alamat'] ?? null,
            'kalurahan' => $data['kalurahan'] ?? null,
            'kapanewon' => $data['kapanewon'] ?? null,
            'location_id' => $data['location_id'] ?? null,
            'ruang_bermain' => $data['ruang_bermain'] ?? null,
            'pojok_bacaan' => $data['pojok_bacaan'] ?? null,
            'kawasan_tanpa_rokok' => $data['kawasan_tanpa_rokok'] ?? null,
            'layanan_ramah_anak' => $data['layanan_ramah_anak'] ?? null,
            'kegiatan_kreatif' => $data['kegiatan_kreatif'] ?? null,
        ];
    }
}
