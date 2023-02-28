<?php

namespace App\Domains\Institutional\Services\Kelurahan;

use App\Domains\Institutional\Models\Kelurahan\Kelurahan;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class KelurahanService.
 */
class KelurahanService extends BaseService
{
    private $subjectMessage = 'Kelurahan';

    /**
     * KelurahanService constructor.
     *
     * @param  Kelurahan  $Kelurahan
     */
    public function __construct(Kelurahan $kelurahan)
    {
        $this->model = $kelurahan;
    }

    /**
     * @param  array  $data
     * @return Kelurahan
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Kelurahan
    {
        DB::beginTransaction();

        try {
            $kelurahan = $this->createKelurahan($data);

            if (isset($data['images'])) {
                $images = $this->uploadFile($data['images'], "kelurahan/{$kelurahan->id}");
                $kelurahan->images()->createMany($images);
            }

            if (isset($data['documents'])) {
                $documents = $this->uploadFile(
                    $data['documents'],
                    "kelurahan/{$kelurahan->id}",
                    'documents'
                );
                $kelurahan->images()->createMany($documents);
            }
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('create_error :subject', [
                'subject' => $this->subjectMessage,
            ]));
        }

        DB::commit();

        return $kelurahan;
    }

    /**
     * @param  Kelurahan  $kelurahan
     * @param  array  $data
     * @return Kelurahan
     *
     * @throws \Throwable
     */
    public function update(
        Kelurahan $kelurahan,
        array $data = []
    ): Kelurahan {
        DB::beginTransaction();

        try {
            $kelurahan->update($this->createData($data));

            if (isset($data['images'])) {
                $images = $this->uploadFile($data['images'], "kelurahan/{$kelurahan->id}");
                $kelurahan->images()->createMany($images);
            }

            if (isset($data['documents'])) {
                $documents = $this->uploadFile(
                    $data['documents'],
                    "kelurahan/{$kelurahan->id}",
                    'documents'
                );
                $kelurahan->images()->createMany($documents);
            }
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('update_error :subject', [
                'subject' => $this->subjectMessage,
            ]));
        }

        DB::commit();

        return $kelurahan;
    }

    /**
     * @param  Kelurahan  $kelurahan
     * @return Kelurahan
     *
     * @throws GeneralException
     */
    public function delete(
        Kelurahan $kelurahan
        ): Kelurahan {
        if ($this->deleteById($kelurahan->id)) {
            return $kelurahan;
        }

        throw new GeneralException(__('delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  Kelurahan  $kelurahan
     * @return Kelurahan
     *
     * @throws GeneralException
     */
    public function restore(
        Kelurahan $kelurahan
        ): Kelurahan {
        if ($kelurahan->restore()) {
            return $kelurahan;
        }

        throw new GeneralException(__('restore_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  Kelurahan  $kelurahan
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(Kelurahan $kelurahan): bool
    {
        if ($kelurahan->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('force_delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  array  $data
     * @return Kelurahan
     */
    protected function createKelurahan(
        array $data = []
        ): Kelurahan {
        return $this->model::create($this->createData($data));
    }

    /**
     * @param  array  $data
     * @return array
     */
    private function createData(array $data = []): array
    {
        return [
            'kalurahan_kelurahan' => $data['kalurahan_kelurahan'] ?? null,
            'kapanewon' => $data['kapanewon'] ?? null,
            'kabupaten' => $data['kabupaten'] ?? null,
            'tahun' => $data['tahun'] ?? null,
            'ketua_gugus' => $data['ketua_gugus'] ?? null,
            'no_gugus' => $data['no_gugus'] ?? null,
            'profil_anak' => $data['profil_anak'] ?? null,
            'forum_anak' => $data['forum_anak'] ?? null,
            'ruang_bermain' => $data['ruang_bermain'] ?? null,
            'pusat_informasi' => $data['pusat_informasi'] ?? null,
            'pusat_kreatifitas' => $data['pusat_kreatifitas'] ?? null,
            'satgas_ppa' => $data['satgas_ppa'] ?? null,
            'patbm' => $data['patbm'] ?? null,
            'pikr' => $data['pikr'] ?? null,
            'kawasan_tanpa_rokok' => $data['kawasan_tanpa_rokok'] ?? null,

        ];
    }
}
