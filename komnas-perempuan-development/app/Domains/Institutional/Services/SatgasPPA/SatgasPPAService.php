<?php

namespace App\Domains\Institutional\Services\SatgasPPA;

use App\Domains\Institutional\Models\SatgasPPA;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class SatgasPPAService.
 */
class SatgasPPAService extends BaseService
{
    /**
     * SatgasPPAService constructor.
     *
     * @param  SatgasPPA  $satgasPpa
     */
    public function __construct(SatgasPPA $satgasPpa)
    {
        $this->model = $satgasPpa;
    }

    /**
     * @param  array  $data
     * @return SatgasPPA
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): SatgasPPA
    {
        DB::beginTransaction();

        try {
            $satgasPpa = $this->createChildProtectionActivity([
                'name' => $data['name'],
                'phone' => $data['phone'],
                'level' => $data['level'],
                'kelurahan' => $data['kelurahan'],
                'kemantren' => $data['kemantren'],
                'kabupaten' => $data['kabupaten'],
                'nomor' => $data['nomor'],
            ]);

            if (isset($data['images'])) {
                $images = $this->uploadFile($data['images'], "satgas-ppa/{$satgasPpa->id}");
                $satgasPpa->images()->createMany($images);
            }

            if (isset($data['documents'])) {
                $documents = $this->uploadFile($data['documents'], "satgas-ppa/{$satgasPpa->id}", 'documents');
                $satgasPpa->images()->createMany($documents);
            }
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat membuat kegiatan perlindungan anak. Silahkan coba lagi.'));
        }

        DB::commit();

        return $satgasPpa;
    }

    /**
     * @param  SatgasPPA  $satgasPpa
     * @param  array  $data
     * @return SatgasPPA
     *
     * @throws \Throwable
     */
    public function update(SatgasPPA $satgasPpa, array $data = []): SatgasPPA
    {
        DB::beginTransaction();

        try {
            $satgasPpa->update([
                'name' => $data['name'],
                'phone' => $data['phone'],
                'level' => $data['level'],
                'kelurahan' => $data['kelurahan'],
                'kemantren' => $data['kemantren'],
                'kabupaten' => $data['kabupaten'],
                'nomor' => $data['nomor'],
            ]);

            if (isset($data['images'])) {
                $images = $this->uploadFile($data['images'], "satgas-ppa/{$satgasPpa->id}");
                $satgasPpa->images()->createMany($images);
            }

            if (isset($data['documents'])) {
                $documents = $this->uploadFile($data['documents'], "satgas-ppa/{$satgasPpa->id}", 'documents');
                $satgasPpa->images()->createMany($documents);
            }
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat memperbarui kegiatan perlindungan anak. Silahkan coba lagi.'));
        }

        DB::commit();

        return $satgasPpa;
    }

    /**
     * @param  SatgasPPA  $satgasPpa
     * @return SatgasPPA
     *
     * @throws GeneralException
     */
    public function delete(SatgasPPA $satgasPpa): SatgasPPA
    {
        if ($this->deleteById($satgasPpa->id)) {
            return $satgasPpa;
        }

        throw new GeneralException('Terjadi kesalahan saat menghapus kegiatan perlindungan anak. Silahkan coba lagi.');
    }

    /**
     * @param  SatgasPPA  $satgasPpa
     * @return SatgasPPA
     *
     * @throws GeneralException
     */
    public function restore(SatgasPPA $satgasPpa): SatgasPPA
    {
        if ($satgasPpa->restore()) {
            return $satgasPpa;
        }

        throw new GeneralException(__('Terjadi kesalahan saat mengembalikan kegiatan perlindungan anak. Silahkan coba lagi.'));
    }

    /**
     * @param  SatgasPPA  $satgasPpa
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(SatgasPPA $satgasPpa): bool
    {
        if ($satgasPpa->images) {
            $satgasPpa->images()->delete();
        }
        if ($satgasPpa->documents) {
            $satgasPpa->documents()->delete();
        }
        \Storage::deleteDirectory("satgas-ppa/{$satgasPpa->id}");
        if ($satgasPpa->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('Terjadi kesalahan saat menghapus secara permanan kegiatan perlindungan anak. Silahkan coba lagi.'));
    }

    /**
     * @param  array  $data
     * @return SatgasPPA
     */
    protected function createChildProtectionActivity(array $data = []): SatgasPPA
    {
        return $this->model::create([
            'name' => $data['name'] ?? null,
            'phone' => $data['phone'] ?? null,
            'level' => $data['level'] ?? null,
            'kelurahan' => $data['kelurahan'] ?? null,
            'kemantren' => $data['kemantren'] ?? null,
            'kabupaten' => $data['kabupaten'] ?? null,
            'nomor' => $data['nomor'] ?? null,
        ]);
    }
}
