<?php

namespace App\Domains\Institutional\Services\Kapanewon;

use App\Domains\Institutional\Models\Kapanewon\Kapanewon;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class KapanewonService.
 */
class KapanewonService extends BaseService
{
    private $subjectMessage = 'Kapanewon';

    /**
     * KapanewonService constructor.
     *
     * @param  Kapanewon  $kapanewon
     */
    public function __construct(Kapanewon $kapanewon)
    {
        $this->model = $kapanewon;
    }

    /**
     * @param  array  $data
     * @return Kapanewon
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Kapanewon
    {
        DB::beginTransaction();

        try {
            $kapanewon = $this->createKapanewon($data);

            if (isset($data['images'])) {
                $images = $this->uploadFile($data['images'], "kapanewon/{$kapanewon->id}");
                $kapanewon->images()->createMany($images);
            }

            if (isset($data['documents'])) {
                $documents = $this->uploadFile(
                    $data['documents'],
                    "kelurahan/{$kapanewon->id}",
                    'documents'
                );
                $kapanewon->images()->createMany($documents);
            }
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('create_error :subject', [
                'subject' => $this->subjectMessage,
            ]));
        }

        DB::commit();

        return $kapanewon;
    }

    /**
     * @param  Kapanewon  $kapanewon
     * @param  array  $data
     * @return Kapanewon
     *
     * @throws \Throwable
     */
    public function update(
        Kapanewon $kapanewon,
        array $data = []
    ): Kapanewon {
        DB::beginTransaction();

        try {
            $kapanewon->update($this->createData($data));

            if (isset($data['images'])) {
                $images = $this->uploadFile($data['images'], "kapanewon/{$kapanewon->id}");
                $kapanewon->images()->createMany($images);
            }

            if (isset($data['documents'])) {
                $documents = $this->uploadFile(
                    $data['documents'],
                    "kapanewon/{$kapanewon->id}",
                    'documents'
                );
                $kapanewon->images()->createMany($documents);
            }
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('update_error :subject', [
                'subject' => $this->subjectMessage,
            ]));
        }

        DB::commit();

        return $kapanewon;
    }

    /**
     * @param  Kapanewon  $kapanewon
     * @return Kapanewon
     *
     * @throws GeneralException
     */
    public function delete(
        Kapanewon $kapanewon
        ): Kapanewon {
        if ($this->deleteById($kapanewon->id)) {
            return $kapanewon;
        }

        throw new GeneralException(__('delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  Kapanewon  $kapanewon
     * @return Kapanewon
     *
     * @throws GeneralException
     */
    public function restore(
        Kapanewon $kapanewon
        ): Kapanewon {
        if ($kapanewon->restore()) {
            return $kapanewon;
        }

        throw new GeneralException(__('restore_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  Kapanewon  $kapanewon
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(Kapanewon $kapanewon): bool
    {
        if ($kapanewon->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('force_delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  array  $data
     * @return Kapanewon
     */
    protected function createKapanewon(
        array $data = []
        ): Kapanewon {
        return $this->model::create($this->createData($data));
    }

    /**
     * @param  array  $data
     * @return array
     */
    private function createData(array $data = []): array
    {
        return [
            'kapanewon_kemantren' => $data['kapanewon_kemantren'] ?? null,
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
