<?php

namespace App\Domains\Cluster5\Services\Patbm;

use App\Domains\Cluster5\Models\Patbm\Patbm;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class PatbmService.
 */
class PatbmService extends BaseService
{
    private $subjectMessage = 'Lembaga Pembinaan Khusus Anak';

    /**
     * PatbmService constructor.
     *
     * @param  Patbm  $patbm
     */
    public function __construct(Patbm $patbm)
    {
        $this->model = $patbm;
    }

    /**
     * @param  array  $data
     * @return Patbm
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Patbm
    {
        DB::beginTransaction();

        try {
            $patbm = $this->createPatbm($data);

            if (isset($data['images'])) {
                $images = $this->uploadFile($data['images'], "patbm/{$patbm->id}");
                $patbm->images()->createMany($images);
            }

            if (isset($data['documents'])) {
                $documents = $this->uploadFile(
                    $data['documents'],
                    "patbm/{$patbm->id}",
                    'documents'
                );
                $patbm->images()->createMany($documents);
            }
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('create_error :subject', [
                'subject' => $this->subjectMessage,
            ]));
        }

        DB::commit();

        return $patbm;
    }

    /**
     * @param  Patbm  $patbm
     * @param  array  $data
     * @return Patbm
     *
     * @throws \Throwable
     */
    public function update(
        Patbm $patbm,
        array $data = []
    ): Patbm {
        DB::beginTransaction();

        try {
            $patbm->update($this->createData($data));

            if (isset($data['images'])) {
                $images = $this->uploadFile($data['images'], "patbm/{$patbm->id}");
                $patbm->images()->createMany($images);
            }

            if (isset($data['documents'])) {
                $documents = $this->uploadFile(
                    $data['documents'],
                    "patbm/{$patbm->id}",
                    'documents'
                );
                $patbm->images()->createMany($documents);
            }
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('update_error :subject', [
                'subject' => $this->subjectMessage,
            ]));
        }

        DB::commit();

        return $patbm;
    }

    /**
     * @param  Patbm  $patbm
     * @return Patbm
     *
     * @throws GeneralException
     */
    public function delete(
        Patbm $patbm
        ): Patbm {
        if ($this->deleteById($patbm->id)) {
            return $patbm;
        }

        throw new GeneralException(__('delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  Patbm  $patbm
     * @return Patbm
     *
     * @throws GeneralException
     */
    public function restore(
        Patbm $patbm
        ): Patbm {
        if ($patbm->restore()) {
            return $patbm;
        }

        throw new GeneralException(__('restore_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  Patbm  $patbm
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(Patbm $patbm): bool
    {
        if ($patbm->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('force_delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  array  $data
     * @return Patbm
     */
    protected function createPatbm(
        array $data = []
        ): Patbm {
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
            'tahun' => $data['tahun'] ?? null,
            'alamat' => $data['alamat'] ?? null,
            'kelurahan' => $data['kelurahan'] ?? null,
            'kapanewon' => $data['kapanewon'] ?? null,
            'kabupaten' => $data['kabupaten'] ?? null,
            'medsos' => $data['medsos'] ?? null,
            'ketua' => $data['ketua'] ?? null,
            'no_telp' => $data['no_telp'] ?? null,
            'fasilitas' => $data['fasilitas'] ?? null,
            'kegiatan' => $data['kegiatan'] ?? null,
            'prestasi' => $data['prestasi'] ?? null,
        ];
    }
}
