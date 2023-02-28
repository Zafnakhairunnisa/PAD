<?php

namespace App\Domains\Cluster2\Services\FamilyConsultancy;

use App\Domains\Cluster2\Models\FamilyConsultancy\FamilyConsultancy;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class FamilyConsultancyService.
 */
class FamilyConsultancyService extends BaseService
{
    /**
     * FamilyConsultancyService constructor.
     *
     * @param  FamilyConsultancy  $familyConsultancy
     */
    public function __construct(FamilyConsultancy $familyConsultancy)
    {
        $this->model = $familyConsultancy;
    }

    /**
     * @param  array  $data
     * @return FamilyConsultancy
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): FamilyConsultancy
    {
        DB::beginTransaction();

        try {
            $familyConsultancy = $this->createFamilyConsultancy([
                'nama' => $data['nama'],
                'kategori_id' => $data['kategori_id'],
                'alamat' => $data['alamat'],
                'kapanewon' => $data['kapanewon'],
                'kalurahan' => $data['kalurahan'],
                'location_id' => $data['location_id'],
                'media_sosial' => $data['media_sosial'],
                'nama_pimpinan' => $data['nama_pimpinan'],
                'no_telepon' => $data['no_telepon'],
                'no_sertifikasi' => $data['no_sertifikasi'],
                'kegiatan' => $data['kegiatan'],
                'klien' => $data['klien'],
                'fasilitas' => $data['fasilitas'],
            ]);

            if (isset($data['images'])) {
                $images = $this->uploadFile($data['images'], "family-consultancy/{$familyConsultancy->id}");
                $familyConsultancy->images()->createMany($images);
            }

            if (isset($data['documents'])) {
                $documents = $this->uploadFile(
                    $data['documents'],
                    "family-consultancy/{$familyConsultancy->id}",
                    'documents'
                );
                $familyConsultancy->images()->createMany($documents);
            }
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat membuat lembaga konsultasi keluarga. Silahkan coba lagi.'));
        }

        DB::commit();

        return $familyConsultancy;
    }

    /**
     * @param  FamilyConsultancy  $familyConsultancy
     * @param  array  $data
     * @return FamilyConsultancy
     *
     * @throws \Throwable
     */
    public function update(FamilyConsultancy $familyConsultancy, array $data = []): FamilyConsultancy
    {
        DB::beginTransaction();

        try {
            $familyConsultancy->update([
                'nama' => $data['nama'],
                'kategori_id' => $data['kategori_id'],
                'alamat' => $data['alamat'],
                'kapanewon' => $data['kapanewon'],
                'kalurahan' => $data['kalurahan'],
                'location_id' => $data['location_id'],
                'media_sosial' => $data['media_sosial'],
                'nama_pimpinan' => $data['nama_pimpinan'],
                'no_telepon' => $data['no_telepon'],
                'no_sertifikasi' => $data['no_sertifikasi'],
                'kegiatan' => $data['kegiatan'],
                'klien' => $data['klien'],
                'fasilitas' => $data['fasilitas'],
            ]);

            if (isset($data['images'])) {
                $images = $this->uploadFile($data['images'], "family-consultancy/{$familyConsultancy->id}");
                $familyConsultancy->images()->createMany($images);
            }

            if (isset($data['documents'])) {
                $documents = $this->uploadFile(
                    $data['documents'],
                    "family-consultancy/{$familyConsultancy->id}",
                    'documents'
                );
                $familyConsultancy->images()->createMany($documents);
            }
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat memperbarui lembaga konsultasi keluarga. Silahkan coba lagi.'));
        }

        DB::commit();

        return $familyConsultancy;
    }

    /**
     * @param  FamilyConsultancy  $familyConsultancy
     * @return FamilyConsultancy
     *
     * @throws GeneralException
     */
    public function delete(FamilyConsultancy $familyConsultancy): FamilyConsultancy
    {
        if ($this->deleteById($familyConsultancy->id)) {
            return $familyConsultancy;
        }

        throw new GeneralException('Terjadi kesalahan saat menghapus lembaga konsultasi keluarga. Silahkan coba lagi.');
    }

    /**
     * @param  FamilyConsultancy  $familyConsultancy
     * @return FamilyConsultancy
     *
     * @throws GeneralException
     */
    public function restore(FamilyConsultancy $familyConsultancy): FamilyConsultancy
    {
        if ($familyConsultancy->restore()) {
            return $familyConsultancy;
        }

        throw new GeneralException(__('Terjadi kesalahan saat mengembalikan lembaga konsultasi keluarga. Silahkan coba lagi.'));
    }

    /**
     * @param  FamilyConsultancy  $familyConsultancy
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(FamilyConsultancy $familyConsultancy): bool
    {
        if ($familyConsultancy->images) {
            $familyConsultancy->images()->delete();
        }
        if ($familyConsultancy->documents) {
            $familyConsultancy->documents()->delete();
        }
        \Storage::deleteDirectory("family-consultancy/{$familyConsultancy->id}");
        if ($familyConsultancy->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('Terjadi kesalahan saat menghapus secara permanan lembaga konsultasi keluarga. Silahkan coba lagi.'));
    }

    /**
     * @param  array  $data
     * @return FamilyConsultancy
     */
    protected function createFamilyConsultancy(array $data = []): FamilyConsultancy
    {
        return $this->model::create([
            'nama' => $data['nama'],
            'kategori_id' => $data['kategori_id'],
            'alamat' => $data['alamat'],
            'kapanewon' => $data['kapanewon'],
            'kalurahan' => $data['kalurahan'],
            'location_id' => $data['location_id'],
            'media_sosial' => $data['media_sosial'],
            'nama_pimpinan' => $data['nama_pimpinan'],
            'no_telepon' => $data['no_telepon'],
            'no_sertifikasi' => $data['no_sertifikasi'],
            'kegiatan' => $data['kegiatan'],
            'klien' => $data['klien'],
            'fasilitas' => $data['fasilitas'],
        ]);
    }
}
