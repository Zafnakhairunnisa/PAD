<?php

namespace App\Domains\Cluster2\Services\ChildWelfareInstitution;

use App\Domains\Cluster2\Models\ChildWelfareInstitution\ChildWelfareInstitution;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class ChildWelfareInstitutionService.
 */
class ChildWelfareInstitutionService extends BaseService
{
    /**
     * ChildWelfareInstitutionService constructor.
     *
     * @param  ChildWelfareInstitution  $childWelfareInstitution
     */
    public function __construct(ChildWelfareInstitution $childWelfareInstitution)
    {
        $this->model = $childWelfareInstitution;
    }

    /**
     * @param  array  $data
     * @return ChildWelfareInstitution
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): ChildWelfareInstitution
    {
        DB::beginTransaction();

        try {
            $childWelfareInstitution = $this->createChildWelfareInstitution([
                'nama' => $data['nama'],
                'jenis_id' => $data['jenis_id'],
                'tahun_berdiri' => $data['tahun_berdiri'],
                'legalitas' => $data['legalitas'],
                'akreditasi' => $data['akreditasi'],
                'dusun' => $data['dusun'],
                'kapanewon' => $data['kapanewon'],
                'kalurahan' => $data['kalurahan'],
                'location_id' => $data['location_id'],
                'media_sosial' => $data['media_sosial'],
                'nama_pimpinan' => $data['nama_pimpinan'],
                'no_telepon' => $data['no_telepon'],
                'jumlah_anak_asuh' => $data['jumlah_anak_asuh'],
                'fasilitas' => $data['fasilitas'],
                'kegiatan' => $data['kegiatan'],
            ]);

            if (isset($data['images'])) {
                $images = $this->uploadFile($data['images'], "child-welfare-institution/{$childWelfareInstitution->id}");
                $childWelfareInstitution->images()->createMany($images);
            }

            if (isset($data['documents'])) {
                $documents = $this->uploadFile(
                    $data['documents'],
                    "child-welfare-institution/{$childWelfareInstitution->id}",
                    'documents'
                );
                $childWelfareInstitution->images()->createMany($documents);
            }
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat membuat lembaga kesejahteraan sosial anak. Silahkan coba lagi.'));
        }

        DB::commit();

        return $childWelfareInstitution;
    }

    /**
     * @param  ChildWelfareInstitution  $childWelfareInstitution
     * @param  array  $data
     * @return ChildWelfareInstitution
     *
     * @throws \Throwable
     */
    public function update(ChildWelfareInstitution $childWelfareInstitution, array $data = []): ChildWelfareInstitution
    {
        DB::beginTransaction();

        try {
            $childWelfareInstitution->update([
                'nama' => $data['nama'],
                'jenis_id' => $data['jenis_id'],
                'tahun_berdiri' => $data['tahun_berdiri'],
                'legalitas' => $data['legalitas'],
                'akreditasi' => $data['akreditasi'],
                'dusun' => $data['dusun'],
                'kapanewon' => $data['kapanewon'],
                'kalurahan' => $data['kalurahan'],
                'location_id' => $data['location_id'],
                'media_sosial' => $data['media_sosial'],
                'nama_pimpinan' => $data['nama_pimpinan'],
                'no_telepon' => $data['no_telepon'],
                'jumlah_anak_asuh' => $data['jumlah_anak_asuh'],
                'fasilitas' => $data['fasilitas'],
                'kegiatan' => $data['kegiatan'],
            ]);

            if (isset($data['images'])) {
                $images = $this->uploadFile($data['images'], "child-welfare-institution/{$childWelfareInstitution->id}");
                $childWelfareInstitution->images()->createMany($images);
            }

            if (isset($data['documents'])) {
                $documents = $this->uploadFile(
                    $data['documents'],
                    "child-welfare-institution/{$childWelfareInstitution->id}",
                    'documents'
                );
                $childWelfareInstitution->images()->createMany($documents);
            }
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat memperbarui lembaga kesejahteraan sosial anak. Silahkan coba lagi.'));
        }

        DB::commit();

        return $childWelfareInstitution;
    }

    /**
     * @param  ChildWelfareInstitution  $childWelfareInstitution
     * @return ChildWelfareInstitution
     *
     * @throws GeneralException
     */
    public function delete(ChildWelfareInstitution $childWelfareInstitution): ChildWelfareInstitution
    {
        if ($this->deleteById($childWelfareInstitution->id)) {
            return $childWelfareInstitution;
        }

        throw new GeneralException('Terjadi kesalahan saat menghapus lembaga kesejahteraan sosial anak. Silahkan coba lagi.');
    }

    /**
     * @param  ChildWelfareInstitution  $childWelfareInstitution
     * @return ChildWelfareInstitution
     *
     * @throws GeneralException
     */
    public function restore(ChildWelfareInstitution $childWelfareInstitution): ChildWelfareInstitution
    {
        if ($childWelfareInstitution->restore()) {
            return $childWelfareInstitution;
        }

        throw new GeneralException(__('Terjadi kesalahan saat mengembalikan lembaga kesejahteraan sosial anak. Silahkan coba lagi.'));
    }

    /**
     * @param  ChildWelfareInstitution  $childWelfareInstitution
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(ChildWelfareInstitution $childWelfareInstitution): bool
    {
        if ($childWelfareInstitution->images) {
            $childWelfareInstitution->images()->delete();
        }
        if ($childWelfareInstitution->documents) {
            $childWelfareInstitution->documents()->delete();
        }
        \Storage::deleteDirectory("child-welfare-institution/{$childWelfareInstitution->id}");
        if ($childWelfareInstitution->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('Terjadi kesalahan saat menghapus secara permanan lembaga kesejahteraan sosial anak. Silahkan coba lagi.'));
    }

    /**
     * @param  array  $data
     * @return ChildWelfareInstitution
     */
    protected function createChildWelfareInstitution(array $data = []): ChildWelfareInstitution
    {
        return $this->model::create([
            'nama' => $data['nama'],
            'jenis_id' => $data['jenis_id'],
            'tahun_berdiri' => $data['tahun_berdiri'],
            'legalitas' => $data['legalitas'],
            'akreditasi' => $data['akreditasi'],
            'dusun' => $data['dusun'],
            'kapanewon' => $data['kapanewon'],
            'kalurahan' => $data['kalurahan'],
            'location_id' => $data['location_id'],
            'media_sosial' => $data['media_sosial'],
            'nama_pimpinan' => $data['nama_pimpinan'],
            'no_telepon' => $data['no_telepon'],
            'jumlah_anak_asuh' => $data['jumlah_anak_asuh'],
            'fasilitas' => $data['fasilitas'],
            'kegiatan' => $data['kegiatan'],
        ]);
    }
}
