<?php

namespace App\Domains\Cluster2\Services\ChildFriendlyPlayroom;

use App\Domains\Cluster2\Models\ChildFriendlyPlayroom\ChildFriendlyPlayroom;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class ChildFriendlyPlayroomService.
 */
class ChildFriendlyPlayroomService extends BaseService
{
    /**
     * ChildFriendlyPlayroomService constructor.
     *
     * @param  ChildFriendlyPlayroom  $childFriendlyPlayroom
     */
    public function __construct(ChildFriendlyPlayroom $childFriendlyPlayroom)
    {
        $this->model = $childFriendlyPlayroom;
    }

    /**
     * @param  array  $data
     * @return ChildFriendlyPlayroom
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): ChildFriendlyPlayroom
    {
        DB::beginTransaction();

        try {
            $childFriendlyPlayroom = $this->createChildFriendlyPlayroom([
                'nama' => $data['nama'],
                'alamat' => $data['alamat'],
                'kapanewon' => $data['kapanewon'],
                'kalurahan' => $data['kalurahan'],
                'location_id' => $data['location_id'],
                'fasilitas' => $data['fasilitas'],
                'sertifikasi' => $data['sertifikasi'],
                'jenis' => $data['jenis'],
            ]);

            if (isset($data['images'])) {
                $images = $this->uploadFile($data['images'], "child-friendly-playroom/{$childFriendlyPlayroom->id}");
                $childFriendlyPlayroom->images()->createMany($images);
            }

            if (isset($data['documents'])) {
                $documents = $this->uploadFile(
                    $data['documents'],
                    "child-friendly-playroom/{$childFriendlyPlayroom->id}",
                    'documents'
                );
                $childFriendlyPlayroom->images()->createMany($documents);
            }
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat membuat ruang bermain ramah anak. Silahkan coba lagi.'));
        }

        DB::commit();

        return $childFriendlyPlayroom;
    }

    /**
     * @param  ChildFriendlyPlayroom  $childFriendlyPlayroom
     * @param  array  $data
     * @return ChildFriendlyPlayroom
     *
     * @throws \Throwable
     */
    public function update(ChildFriendlyPlayroom $childFriendlyPlayroom, array $data = []): ChildFriendlyPlayroom
    {
        DB::beginTransaction();

        try {
            $childFriendlyPlayroom->update([
                'nama' => $data['nama'],
                'alamat' => $data['alamat'],
                'kapanewon' => $data['kapanewon'],
                'kalurahan' => $data['kalurahan'],
                'location_id' => $data['location_id'],
                'fasilitas' => $data['fasilitas'],
                'sertifikasi' => $data['sertifikasi'],
                'jenis' => $data['jenis'],
            ]);

            if (isset($data['images'])) {
                $images = $this->uploadFile($data['images'], "child-friendly-playroom/{$childFriendlyPlayroom->id}");
                $childFriendlyPlayroom->images()->createMany($images);
            }

            if (isset($data['documents'])) {
                $documents = $this->uploadFile(
                    $data['documents'],
                    "child-friendly-playroom/{$childFriendlyPlayroom->id}",
                    'documents'
                );
                $childFriendlyPlayroom->images()->createMany($documents);
            }
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat memperbarui ruang bermain ramah anak. Silahkan coba lagi.'));
        }

        DB::commit();

        return $childFriendlyPlayroom;
    }

    /**
     * @param  ChildFriendlyPlayroom  $childFriendlyPlayroom
     * @return ChildFriendlyPlayroom
     *
     * @throws GeneralException
     */
    public function delete(ChildFriendlyPlayroom $childFriendlyPlayroom): ChildFriendlyPlayroom
    {
        if ($this->deleteById($childFriendlyPlayroom->id)) {
            return $childFriendlyPlayroom;
        }

        throw new GeneralException('Terjadi kesalahan saat menghapus ruang bermain ramah anak. Silahkan coba lagi.');
    }

    /**
     * @param  ChildFriendlyPlayroom  $childFriendlyPlayroom
     * @return ChildFriendlyPlayroom
     *
     * @throws GeneralException
     */
    public function restore(ChildFriendlyPlayroom $childFriendlyPlayroom): ChildFriendlyPlayroom
    {
        if ($childFriendlyPlayroom->restore()) {
            return $childFriendlyPlayroom;
        }

        throw new GeneralException(__('Terjadi kesalahan saat mengembalikan ruang bermain ramah anak. Silahkan coba lagi.'));
    }

    /**
     * @param  ChildFriendlyPlayroom  $childFriendlyPlayroom
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(ChildFriendlyPlayroom $childFriendlyPlayroom): bool
    {
        if ($childFriendlyPlayroom->images) {
            $childFriendlyPlayroom->images()->delete();
        }
        if ($childFriendlyPlayroom->documents) {
            $childFriendlyPlayroom->documents()->delete();
        }
        \Storage::deleteDirectory("child-friendly-playroom/{$childFriendlyPlayroom->id}");
        if ($childFriendlyPlayroom->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('Terjadi kesalahan saat menghapus secara permanan ruang bermain ramah anak. Silahkan coba lagi.'));
    }

    /**
     * @param  array  $data
     * @return ChildFriendlyPlayroom
     */
    protected function createChildFriendlyPlayroom(array $data = []): ChildFriendlyPlayroom
    {
        return $this->model::create([
            'nama' => $data['nama'],
            'alamat' => $data['alamat'],
            'kapanewon' => $data['kapanewon'],
            'kalurahan' => $data['kalurahan'],
            'location_id' => $data['location_id'],
            'fasilitas' => $data['fasilitas'],
            'sertifikasi' => $data['sertifikasi'],
            'jenis' => $data['jenis'],
        ]);
    }
}
