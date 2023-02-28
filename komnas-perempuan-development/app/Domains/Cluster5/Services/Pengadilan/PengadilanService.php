<?php

namespace App\Domains\Cluster5\Services\Pengadilan;

use App\Domains\Cluster5\Models\Pengadilan\Pengadilan;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class PengadilanService.
 */
class PengadilanService extends BaseService
{
    private $subjectMessage = 'Pengadilan DIY';

    /**
     * PengadilanService constructor.
     *
     * @param  Pengadilan  $Pengadilan
     */
    public function __construct(Pengadilan $pengadilan)
    {
        $this->model = $pengadilan;
    }

    /**
     * @param  array  $data
     * @return Pengadilan
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Pengadilan
    {
        DB::beginTransaction();

        try {
            $pengadilan = $this->createPengadilan($data);

            if (isset($data['images'])) {
                $images = $this->uploadFile($data['images'], "pengadilan/{$pengadilan->id}");
                $pengadilan->images()->createMany($images);
            }

            if (isset($data['documents'])) {
                $documents = $this->uploadFile(
                    $data['documents'],
                    "pengadilan/{$pengadilan->id}",
                    'documents'
                );
                $pengadilan->images()->createMany($documents);
            }
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('create_error :subject', [
                'subject' => $this->subjectMessage,
            ]));
        }

        DB::commit();

        return $pengadilan;
    }

    /**
     * @param  Pengadilan  $pengadilan
     * @param  array  $data
     * @return Pengadilan
     *
     * @throws \Throwable
     */
    public function update(
        Pengadilan $pengadilan,
        array $data = []
    ): Pengadilan {
        DB::beginTransaction();

        try {
            $pengadilan->update($this->createData($data));

            if (isset($data['images'])) {
                $images = $this->uploadFile($data['images'], "pengadilan/{$pengadilan->id}");
                $pengadilan->images()->createMany($images);
            }

            if (isset($data['documents'])) {
                $documents = $this->uploadFile(
                    $data['documents'],
                    "pengadilan/{$pengadilan->id}",
                    'documents'
                );
                $pengadilan->images()->createMany($documents);
            }
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('update_error :subject', [
                'subject' => $this->subjectMessage,
            ]));
        }

        DB::commit();

        return $pengadilan;
    }

    /**
     * @param  Pengadilan  $pengadilan
     * @return Pengadilan
     *
     * @throws GeneralException
     */
    public function delete(
        Pengadilan $pengadilan
        ): Pengadilan {
        if ($this->deleteById($pengadilan->id)) {
            return $pengadilan;
        }

        throw new GeneralException(__('delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  Pengadilan  $pengadilan
     * @return Pengadilan
     *
     * @throws GeneralException
     */
    public function restore(
        Pengadilan $pengadilan
        ): Pengadilan {
        if ($pengadilan->restore()) {
            return $pengadilan;
        }

        throw new GeneralException(__('restore_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  Pengadilan  $pengadilan
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(Pengadilan $pengadilan): bool
    {
        if ($pengadilan->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('force_delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  array  $data
     * @return Pengadilan
     */
    protected function createPengadilan(
        array $data = []
        ): Pengadilan {
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
