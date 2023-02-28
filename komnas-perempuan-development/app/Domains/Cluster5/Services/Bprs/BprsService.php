<?php

namespace App\Domains\Cluster5\Services\Bprs;

use App\Domains\Cluster5\Models\Bprs\Bprs;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class BprsService.
 */
class BprsService extends BaseService
{
    private $subjectMessage = 'balai perlindungan dan rehabilitasi sosial remaja (BPRSR) DIY';

    /**
     * BprsService constructor.
     *
     * @param  Bprs  $bprs
     */
    public function __construct(Bprs $bprs)
    {
        $this->model = $bprs;
    }

    /**
     * @param  array  $data
     * @return Bprs
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Bprs
    {
        DB::beginTransaction();

        try {
            $bprs = $this->createBprs($data);

            if (isset($data['images'])) {
                $images = $this->uploadFile($data['images'], "bprs/{$bprs->id}");
                $bprs->images()->createMany($images);
            }

            if (isset($data['documents'])) {
                $documents = $this->uploadFile(
                    $data['documents'],
                    "bprs/{$bprs->id}",
                    'documents'
                );
                $bprs->images()->createMany($documents);
            }
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('create_error :subject', [
                'subject' => $this->subjectMessage,
            ]));
        }

        DB::commit();

        return $bprs;
    }

    /**
     * @param  Bprs  $bprs
     * @param  array  $data
     * @return Bprs
     *
     * @throws \Throwable
     */
    public function update(
        Bprs $bprs,
        array $data = []
    ): Bprs {
        DB::beginTransaction();

        try {
            $bprs->update($this->createData($data));

            if (isset($data['images'])) {
                $images = $this->uploadFile($data['images'], "bprs/{$bprs->id}");
                $bprs->images()->createMany($images);
            }

            if (isset($data['documents'])) {
                $documents = $this->uploadFile(
                    $data['documents'],
                    "bprs/{$bprs->id}",
                    'documents'
                );
                $bprs->images()->createMany($documents);
            }
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('update_error :subject', [
                'subject' => $this->subjectMessage,
            ]));
        }

        DB::commit();

        return $bprs;
    }

    /**
     * @param  Bprs  $bprs
     * @return Bprs
     *
     * @throws GeneralException
     */
    public function delete(
        Bprs $bprs
        ): Bprs {
        if ($this->deleteById($bprs->id)) {
            return $bprs;
        }

        throw new GeneralException(__('delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  Bprs  $bprs
     * @return Bprs
     *
     * @throws GeneralException
     */
    public function restore(
        Bprs $bprs
        ): Bprs {
        if ($bprs->restore()) {
            return $bprs;
        }

        throw new GeneralException(__('restore_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  Bprs  $bprs
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(Bprs $bprs): bool
    {
        if ($bprs->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('force_delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  array  $data
     * @return Bprs
     */
    protected function createBprs(
        array $data = []
        ): Bprs {
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
            'sarana_prasarana' => $data['sarana_prasarana'] ?? null,
        ];
    }
}
