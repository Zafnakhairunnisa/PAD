<?php

namespace App\Domains\Institutional\Services\ChildMedia;

use App\Domains\Institutional\Models\ChildMedia;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class ChildMediaService.
 */
class ChildMediaService extends BaseService
{
    /**
     * ChildMediaService constructor.
     *
     * @param  ChildMedia  $childMedia
     */
    public function __construct(ChildMedia $childMedia)
    {
        $this->model = $childMedia;
    }

    /**
     * @param  array  $data
     * @return ChildMedia
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): ChildMedia
    {
        DB::beginTransaction();

        try {
            $childMedia = $this->createChildMedia([
                'nama' => $data['nama'],
                'jenis_media_id' => $data['jenis_media_id'],
                'alamat' => $data['alamat'],
                'kalurahan' => $data['kalurahan'],
                'kapanewon' => $data['kapanewon'],
                'kabupaten' => $data['kabupaten'],
                'media_sosial' => $data['media_sosial'],
                'nomor_telepon' => $data['nomor_telepon'],
                'nama_pimpinan' => $data['nama_pimpinan'],
                'nama_acara' => $data['nama_acara'],
            ]);

            if (isset($data['images'])) {
                $images = $this->uploadFile($data['images'], "child-care-organization/{$childMedia->id}");
                $childMedia->images()->createMany($images);
            }

            if (isset($data['documents'])) {
                $documents = $this->uploadFile($data['documents'], "child-care-organization/{$childMedia->id}", 'documents');
                $childMedia->images()->createMany($documents);
            }
        } catch (Exception $e) {
            DB::rollBack();
            throw new GeneralException(__('Terjadi kesalahan saat membuat media massa sahabat anak. Silahkan coba lagi.'));
        }

        DB::commit();

        return $childMedia;
    }

    /**
     * @param  ChildMedia  $childMedia
     * @param  array  $data
     * @return ChildMedia
     *
     * @throws \Throwable
     */
    public function update(ChildMedia $childMedia, array $data = []): ChildMedia
    {
        DB::beginTransaction();

        try {
            $childMedia->update([
                'nama' => $data['nama'],
                'jenis_media_id' => $data['jenis_media_id'],
                'alamat' => $data['alamat'],
                'kalurahan' => $data['kalurahan'],
                'kapanewon' => $data['kapanewon'],
                'kabupaten' => $data['kabupaten'],
                'media_sosial' => $data['media_sosial'],
                'nomor_telepon' => $data['nomor_telepon'],
                'nama_pimpinan' => $data['nama_pimpinan'],
                'nama_acara' => $data['nama_acara'],
            ]);

            if (isset($data['images'])) {
                $images = $this->uploadFile($data['images'], "child-care-organization/{$childMedia->id}");
                $childMedia->images()->createMany($images);
            }

            if (isset($data['documents'])) {
                $documents = $this->uploadFile($data['documents'], "child-care-organization/{$childMedia->id}", 'documents');
                $childMedia->images()->createMany($documents);
            }
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat memperbarui media massa sahabat anak. Silahkan coba lagi.'));
        }

        DB::commit();

        return $childMedia;
    }

    /**
     * @param  ChildMedia  $childMedia
     * @return ChildMedia
     *
     * @throws GeneralException
     */
    public function delete(ChildMedia $childMedia): ChildMedia
    {
        if ($this->deleteById($childMedia->id)) {
            return $childMedia;
        }

        throw new GeneralException('Terjadi kesalahan saat menghapus media massa sahabat anak. Silahkan coba lagi.');
    }

    /**
     * @param  ChildMedia  $childMedia
     * @return ChildMedia
     *
     * @throws GeneralException
     */
    public function restore(ChildMedia $childMedia): ChildMedia
    {
        if ($childMedia->restore()) {
            return $childMedia;
        }

        throw new GeneralException(__('Terjadi kesalahan saat mengembalikan media massa sahabat anak. Silahkan coba lagi.'));
    }

    /**
     * @param  ChildMedia  $childMedia
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(ChildMedia $childMedia): bool
    {
        if ($childMedia->images) {
            $childMedia->images()->delete();
        }
        if ($childMedia->documents) {
            $childMedia->documents()->delete();
        }
        \Storage::deleteDirectory("child-care-organization/{$childMedia->id}");
        if ($childMedia->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('Terjadi kesalahan saat menghapus secara permanan media massa sahabat anak. Silahkan coba lagi.'));
    }

    /**
     * @param  array  $data
     * @return ChildMedia
     */
    protected function createChildMedia(array $data = []): ChildMedia
    {
        return $this->model::create([
            'nama' => $data['nama'] ?? null,
            'jenis_media_id' => $data['jenis_media_id'] ?? null,
            'alamat' => $data['alamat'] ?? null,
            'kalurahan' => $data['kalurahan'] ?? null,
            'kapanewon' => $data['kapanewon'] ?? null,
            'kabupaten' => $data['kabupaten'] ?? null,
            'media_sosial' => $data['media_sosial'] ?? null,
            'nomor_telepon' => $data['nomor_telepon'] ?? null,
            'nama_pimpinan' => $data['nama_pimpinan'] ?? null,
            'nama_acara' => $data['nama_acara'] ?? null,
        ]);
    }
}
