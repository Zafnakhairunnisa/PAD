<?php

namespace App\Domains\Institutional\Services\ChildForum;

use App\Domains\Institutional\Models\ChildForum;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class ChildForumService.
 */
class ChildForumService extends BaseService
{
    /**
     * ChildForumService constructor.
     *
     * @param  ChildForum  $childForum
     */
    public function __construct(ChildForum $childForum)
    {
        $this->model = $childForum;
    }

    /**
     * @param  array  $data
     * @return ChildForum
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): ChildForum
    {
        DB::beginTransaction();

        try {
            $childForum = $this->createChildForum([
                'nama' => $data['nama'],
                'tingkat' => $data['tingkat'],
                'surat_keputusan' => $data['surat_keputusan'],
                'waktu_pembentukan' => $data['waktu_pembentukan'],
                'nama_ketua' => $data['nama_ketua'],
                'nomor_telepon' => $data['nomor_telepon'],
                'alamat' => $data['alamat'],
                'kalurahan' => $data['kalurahan'],
                'kapanewon' => $data['kapanewon'],
                'kabupaten' => $data['kabupaten'],
                'media_sosial' => $data['media_sosial'],
                'pelatihan_kha' => $data['pelatihan_kha'],
                'partisipasi_musrenbang' => $data['partisipasi_musrenbang'],
                'kegiatan' => $data['kegiatan'],
                'prestasi' => $data['prestasi'],
            ]);

            if (isset($data['images'])) {
                $images = $this->uploadFile($data['images'], "child-forum/{$childForum->id}");
                $childForum->images()->createMany($images);
            }

            if (isset($data['documents'])) {
                $documents = $this->uploadFile($data['documents'], "child-forum/{$childForum->id}", 'documents');
                $childForum->images()->createMany($documents);
            }
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat membuat forum anak. Silahkan coba lagi.'));
        }

        DB::commit();

        return $childForum;
    }

    /**
     * @param  ChildForum  $childForum
     * @param  array  $data
     * @return ChildForum
     *
     * @throws \Throwable
     */
    public function update(ChildForum $childForum, array $data = []): ChildForum
    {
        DB::beginTransaction();

        try {
            $childForum->update([
                'nama' => $data['nama'],
                'tingkat' => $data['tingkat'],
                'surat_keputusan' => $data['surat_keputusan'],
                'waktu_pembentukan' => $data['waktu_pembentukan'],
                'nama_ketua' => $data['nama_ketua'],
                'nomor_telepon' => $data['nomor_telepon'],
                'alamat' => $data['alamat'],
                'kalurahan' => $data['kalurahan'],
                'kapanewon' => $data['kapanewon'],
                'kabupaten' => $data['kabupaten'],
                'media_sosial' => $data['media_sosial'],
                'pelatihan_kha' => $data['pelatihan_kha'],
                'partisipasi_musrenbang' => $data['partisipasi_musrenbang'],
                'kegiatan' => $data['kegiatan'],
                'prestasi' => $data['prestasi'],
            ]);

            if (isset($data['images'])) {
                $images = $this->uploadFile($data['images'], "child-forum/{$childForum->id}");
                $childForum->images()->createMany($images);
            }

            if (isset($data['documents'])) {
                $documents = $this->uploadFile($data['documents'], "child-forum/{$childForum->id}", 'documents');
                $childForum->images()->createMany($documents);
            }
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat memperbarui forum anak. Silahkan coba lagi.'));
        }

        DB::commit();

        return $childForum;
    }

    /**
     * @param  ChildForum  $childForum
     * @return ChildForum
     *
     * @throws GeneralException
     */
    public function delete(ChildForum $childForum): ChildForum
    {
        if ($this->deleteById($childForum->id)) {
            return $childForum;
        }

        throw new GeneralException('Terjadi kesalahan saat menghapus forum anak. Silahkan coba lagi.');
    }

    /**
     * @param  ChildForum  $childForum
     * @return ChildForum
     *
     * @throws GeneralException
     */
    public function restore(ChildForum $childForum): ChildForum
    {
        if ($childForum->restore()) {
            return $childForum;
        }

        throw new GeneralException(__('Terjadi kesalahan saat mengembalikan forum anak. Silahkan coba lagi.'));
    }

    /**
     * @param  ChildForum  $childForum
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(ChildForum $childForum): bool
    {
        if ($childForum->images) {
            $childForum->images()->delete();
        }
        if ($childForum->documents) {
            $childForum->documents()->delete();
        }
        \Storage::deleteDirectory("child-forum/{$childForum->id}");
        if ($childForum->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('Terjadi kesalahan saat menghapus secara permanan forum anak. Silahkan coba lagi.'));
    }

    /**
     * @param  array  $data
     * @return ChildForum
     */
    protected function createChildForum(array $data = []): ChildForum
    {
        return $this->model::create([
            'nama' => $data['nama'] ?? null,
            'tingkat' => $data['tingkat'] ?? null,
            'surat_keputusan' => $data['surat_keputusan'] ?? null,
            'waktu_pembentukan' => $data['waktu_pembentukan'] ?? null,
            'nama_ketua' => $data['nama_ketua'] ?? null,
            'nomor_telepon' => $data['nomor_telepon'] ?? null,
            'alamat' => $data['alamat'] ?? null,
            'kalurahan' => $data['kalurahan'] ?? null,
            'kapanewon' => $data['kapanewon'] ?? null,
            'kabupaten' => $data['kabupaten'] ?? null,
            'media_sosial' => $data['media_sosial'] ?? null,
            'pelatihan_kha' => $data['pelatihan_kha'] ?? null,
            'partisipasi_musrenbang' => $data['partisipasi_musrenbang'] ?? null,
            'kegiatan' => $data['kegiatan'] ?? null,
            'prestasi' => $data['prestasi'] ?? null,
        ]);
    }
}
