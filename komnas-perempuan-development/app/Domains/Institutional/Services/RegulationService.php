<?php

namespace App\Domains\Institutional\Services;

use App\Domains\Institutional\Models\Regulation;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class RegulationService.
 */
class RegulationService extends BaseService
{
    /**
     * RegulationService constructor.
     *
     * @param  Regulation  $regulation
     */
    public function __construct(Regulation $regulation)
    {
        $this->model = $regulation;
    }

    /**
     * @param  array  $data
     * @return Regulation
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): Regulation
    {
        DB::beginTransaction();

        try {
            $regulation = $this->createRegulation([
                'name' => $data['name'],
                'year' => $data['year'],
                'rule_type' => $data['rule_type'],
                'type' => $data['type'],
                'location_id' => $data['location_id'],
            ]);

            if (isset($data['images'])) {
                $images = $this->uploadFile($data['images'], "regulations/{$regulation->id}");
                $regulation->images()->createMany($images);
            }

            if (isset($data['documents'])) {
                $documents = $this->uploadFile($data['documents'], "regulations/{$regulation->id}", 'documents');
                $regulation->images()->createMany($documents);
            }
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat membuat kelembagaan ini. Silahkan coba lagi.'));
        }

        DB::commit();

        return $regulation;
    }

    /**
     * @param  Regulation  $regulation
     * @param  array  $data
     * @return Regulation
     *
     * @throws \Throwable
     */
    public function update(Regulation $regulation, array $data = []): Regulation
    {
        DB::beginTransaction();

        try {
            $regulation->update([
                'name' => $data['name'],
                'year' => $data['year'],
                'rule_type' => $data['rule_type'],
                'type' => $data['type'],
                'location_id' => $data['location_id'],
            ]);

            if (isset($data['images'])) {
                $images = $this->uploadFile($data['images'], "regulations/{$regulation->id}");
                $regulation->images()->createMany($images);
            }

            if (isset($data['documents'])) {
                $documents = $this->uploadFile($data['documents'], "regulations/{$regulation->id}", 'documents');
                $regulation->images()->createMany($documents);
            }
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat memperbarui kelembagaan ini. Silahkan coba lagi.'));
        }

        DB::commit();

        return $regulation;
    }

    /**
     * @param  Regulation  $regulation
     * @return Regulation
     *
     * @throws GeneralException
     */
    public function delete(Regulation $regulation): Regulation
    {
        if ($this->deleteById($regulation->id)) {
            return $regulation;
        }

        throw new GeneralException('Terjadi kesalahan saat menghapus kelembagaan ini. Silahkan coba lagi.');
    }

    /**
     * @param  Regulation  $regulation
     * @return Regulation
     *
     * @throws GeneralException
     */
    public function restore(Regulation $regulation): Regulation
    {
        if ($regulation->restore()) {
            return $regulation;
        }

        throw new GeneralException(__('Terjadi kesalahan saat mengembalikan kelembagaan ini. Silahkan coba lagi.'));
    }

    /**
     * @param  Regulation  $regulation
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(Regulation $regulation): bool
    {
        if ($regulation->images) {
            $regulation->images()->delete();
        }
        if ($regulation->documents) {
            $regulation->documents()->delete();
        }
        \Storage::deleteDirectory("regulations/{$regulation->id}");
        if ($regulation->forceDelete()) {
            // $this->model->images()->delete();
            return true;
        }

        throw new GeneralException(__('Terjadi kesalahan saat menghapus secara permanan kelembagaan ini. Silahkan coba lagi.'));
    }

    /**
     * @param  array  $data
     * @return Regulation
     */
    protected function createRegulation(array $data = []): Regulation
    {
        return $this->model::create([
            'name' => $data['name'] ?? null,
            'year' => $data['year'] ?? null,
            'rule_type' => $data['rule_type'] ?? null,
            'type' => $data['type'] ?? null,
            'location_id' => $data['location_id'] ?? null,
        ]);
    }
}
