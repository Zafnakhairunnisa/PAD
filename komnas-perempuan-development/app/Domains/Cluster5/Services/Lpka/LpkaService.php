<?php

namespace App\Domains\Cluster5\Services\Lpka;

use App\Domains\Cluster5\Models\Lpka\Lpka;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class LpkaService.
 */
class LpkaService extends BaseService
{
    private $subjectMessage = 'Lembaga Pembinaan Khusus Anak';

    /**
     * LpkaService constructor.
     *
     * @param  Lpka  $lpka
     */
    public function __construct(Lpka $lpka)
    {
        $this->model = $lpka;
    }

    /**
     * @param  array  $data
     * @return Lpka
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Lpka
    {
        DB::beginTransaction();

        try {
            $lpka = $this->createLpka($data);

            if (isset($data['images'])) {
                $images = $this->uploadFile($data['images'], "lpka/{$lpka->id}");
                $lpka->images()->createMany($images);
            }

            if (isset($data['documents'])) {
                $documents = $this->uploadFile(
                    $data['documents'],
                    "lpka/{$lpka->id}",
                    'documents'
                );
                $lpka->images()->createMany($documents);
            }
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('create_error :subject', [
                'subject' => $this->subjectMessage,
            ]));
        }

        DB::commit();

        return $lpka;
    }

    /**
     * @param  Lpka  $lpka
     * @param  array  $data
     * @return Lpka
     *
     * @throws \Throwable
     */
    public function update(
        Lpka $lpka,
        array $data = []
    ): Lpka {
        DB::beginTransaction();

        try {
            $lpka->update($this->createData($data));

            if (isset($data['images'])) {
                $images = $this->uploadFile($data['images'], "lpka/{$lpka->id}");
                $lpka->images()->createMany($images);
            }

            if (isset($data['documents'])) {
                $documents = $this->uploadFile(
                    $data['documents'],
                    "lpka/{$lpka->id}",
                    'documents'
                );
                $lpka->images()->createMany($documents);
            }
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('update_error :subject', [
                'subject' => $this->subjectMessage,
            ]));
        }

        DB::commit();

        return $lpka;
    }

    /**
     * @param  Lpka  $lpka
     * @return Lpka
     *
     * @throws GeneralException
     */
    public function delete(
        Lpka $lpka
        ): Lpka {
        if ($this->deleteById($lpka->id)) {
            return $lpka;
        }

        throw new GeneralException(__('delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  Lpka  $lpka
     * @return Lpka
     *
     * @throws GeneralException
     */
    public function restore(
        Lpka $lpka
        ): Lpka {
        if ($lpka->restore()) {
            return $lpka;
        }

        throw new GeneralException(__('restore_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  Lpka  $lpka
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(Lpka $lpka): bool
    {
        if ($lpka->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('force_delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  array  $data
     * @return Lpka
     */
    protected function createLpka(
        array $data = []
        ): Lpka {
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
            'jenis_ruangan' => $data['jenis_ruangan'] ?? null,
            'sarana_prasarana' => $data['sarana_prasarana'] ?? null,
        ];
    }
}
