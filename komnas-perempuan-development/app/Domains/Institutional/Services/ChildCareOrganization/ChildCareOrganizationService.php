<?php

namespace App\Domains\Institutional\Services\ChildCareOrganization;

use App\Domains\Institutional\Models\ChildCareOrganization;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class ChildCareOrganizationService.
 */
class ChildCareOrganizationService extends BaseService
{
    /**
     * ChildCareOrganizationService constructor.
     *
     * @param  ChildCareOrganization  $childCareOrganization
     */
    public function __construct(ChildCareOrganization $childCareOrganization)
    {
        $this->model = $childCareOrganization;
    }

    /**
     * @param  array  $data
     * @return ChildCareOrganization
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): ChildCareOrganization
    {
        DB::beginTransaction();

        try {
            $childCareOrganization = $this->createChildCareOrganization([
                'nama' => $data['nama'],
                'location_id' => $data['location_id'],
                'alamat' => $data['alamat'],
                'kalurahan' => $data['kalurahan'],
                'kapanewon' => $data['kapanewon'],
                'kabupaten' => $data['kabupaten'],
                'media_sosial' => $data['media_sosial'],
                'nomor_telepon' => $data['nomor_telepon'],
                'nama_pimpinan' => $data['nama_pimpinan'],
                'kegiatan' => $data['kegiatan'],
            ]);

            if (isset($data['images'])) {
                $images = $this->uploadFile($data['images'], "child-care-organization/{$childCareOrganization->id}");
                $childCareOrganization->images()->createMany($images);
            }

            if (isset($data['documents'])) {
                $documents = $this->uploadFile($data['documents'], "child-care-organization/{$childCareOrganization->id}", 'documents');
                $childCareOrganization->images()->createMany($documents);
            }
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat membuat organisasi peduli anak. Silahkan coba lagi.'));
        }

        DB::commit();

        return $childCareOrganization;
    }

    /**
     * @param  ChildCareOrganization  $childCareOrganization
     * @param  array  $data
     * @return ChildCareOrganization
     *
     * @throws \Throwable
     */
    public function update(ChildCareOrganization $childCareOrganization, array $data = []): ChildCareOrganization
    {
        DB::beginTransaction();

        try {
            $childCareOrganization->update([
                'nama' => $data['nama'],
                'location_id' => $data['location_id'],
                'alamat' => $data['alamat'],
                'kalurahan' => $data['kalurahan'],
                'kapanewon' => $data['kapanewon'],
                'kabupaten' => $data['kabupaten'],
                'media_sosial' => $data['media_sosial'],
                'nomor_telepon' => $data['nomor_telepon'],
                'nama_pimpinan' => $data['nama_pimpinan'],
                'kegiatan' => $data['kegiatan'],
            ]);

            if (isset($data['images'])) {
                $images = $this->uploadFile($data['images'], "child-care-organization/{$childCareOrganization->id}");
                $childCareOrganization->images()->createMany($images);
            }

            if (isset($data['documents'])) {
                $documents = $this->uploadFile($data['documents'], "child-care-organization/{$childCareOrganization->id}", 'documents');
                $childCareOrganization->images()->createMany($documents);
            }
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat memperbarui organisasi peduli anak. Silahkan coba lagi.'));
        }

        DB::commit();

        return $childCareOrganization;
    }

    /**
     * @param  ChildCareOrganization  $childCareOrganization
     * @return ChildCareOrganization
     *
     * @throws GeneralException
     */
    public function delete(ChildCareOrganization $childCareOrganization): ChildCareOrganization
    {
        if ($this->deleteById($childCareOrganization->id)) {
            return $childCareOrganization;
        }

        throw new GeneralException('Terjadi kesalahan saat menghapus organisasi peduli anak. Silahkan coba lagi.');
    }

    /**
     * @param  ChildCareOrganization  $childCareOrganization
     * @return ChildCareOrganization
     *
     * @throws GeneralException
     */
    public function restore(ChildCareOrganization $childCareOrganization): ChildCareOrganization
    {
        if ($childCareOrganization->restore()) {
            return $childCareOrganization;
        }

        throw new GeneralException(__('Terjadi kesalahan saat mengembalikan organisasi peduli anak. Silahkan coba lagi.'));
    }

    /**
     * @param  ChildCareOrganization  $childCareOrganization
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(ChildCareOrganization $childCareOrganization): bool
    {
        if ($childCareOrganization->images) {
            $childCareOrganization->images()->delete();
        }
        if ($childCareOrganization->documents) {
            $childCareOrganization->documents()->delete();
        }
        \Storage::deleteDirectory("child-care-organization/{$childCareOrganization->id}");
        if ($childCareOrganization->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('Terjadi kesalahan saat menghapus secara permanan organisasi peduli anak. Silahkan coba lagi.'));
    }

    /**
     * @param  array  $data
     * @return ChildCareOrganization
     */
    protected function createChildCareOrganization(array $data = []): ChildCareOrganization
    {
        return $this->model::create([
            'nama' => $data['nama'] ?? null,
            'location_id' => $data['location_id'] ?? null,
            'alamat' => $data['alamat'] ?? null,
            'kalurahan' => $data['kalurahan'] ?? null,
            'kapanewon' => $data['kapanewon'] ?? null,
            'kabupaten' => $data['kabupaten'] ?? null,
            'media_sosial' => $data['media_sosial'] ?? null,
            'nomor_telepon' => $data['nomor_telepon'] ?? null,
            'nama_pimpinan' => $data['nama_pimpinan'] ?? null,
            'kegiatan' => $data['kegiatan'] ?? null,
        ]);
    }
}
