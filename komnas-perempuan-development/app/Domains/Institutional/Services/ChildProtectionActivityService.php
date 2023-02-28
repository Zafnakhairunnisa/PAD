<?php

namespace App\Domains\Institutional\Services;

use App\Domains\Institutional\Models\ChildProtectionActivity;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class ChildProtectionActivityService.
 */
class ChildProtectionActivityService extends BaseService
{
    /**
     * ChildProtectionActivityService constructor.
     *
     * @param  ChildProtectionActivity  $childProtectionActivity
     */
    public function __construct(ChildProtectionActivity $childProtectionActivity)
    {
        $this->model = $childProtectionActivity;
    }

    /**
     * @param  array  $data
     * @return ChildProtectionActivity
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): ChildProtectionActivity
    {
        DB::beginTransaction();

        try {
            $childProtectionActivity = $this->createChildProtectionActivity([
                'company_name' => $data['company_name'],
                'source_of_fund_id' => $data['source_of_fund_id'],
                'activity_name' => $data['activity_name'],
                'activity_type_id' => $data['activity_type_id'],
                'target' => $data['target'],
                'budget' => $data['budget'],
                'year' => $data['year'],
                'location_id' => $data['location_id'],
            ]);

            if (isset($data['images'])) {
                $images = $this->uploadFile($data['images'], "child-protection-activities/{$childProtectionActivity->id}");
                $childProtectionActivity->images()->createMany($images);
            }

            if (isset($data['documents'])) {
                $documents = $this->uploadFile($data['documents'], "child-protection-activities/{$childProtectionActivity->id}", 'documents');
                $childProtectionActivity->images()->createMany($documents);
            }
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat membuat kegiatan perlindungan anak. Silahkan coba lagi.'));
        }

        DB::commit();

        return $childProtectionActivity;
    }

    /**
     * @param  ChildProtectionActivity  $childProtectionActivity
     * @param  array  $data
     * @return ChildProtectionActivity
     *
     * @throws \Throwable
     */
    public function update(ChildProtectionActivity $childProtectionActivity, array $data = []): ChildProtectionActivity
    {
        DB::beginTransaction();

        try {
            $childProtectionActivity->update([
                'company_name' => $data['company_name'],
                'source_of_fund_id' => $data['source_of_fund_id'],
                'activity_name' => $data['activity_name'],
                'activity_type_id' => $data['activity_type_id'],
                'target' => $data['target'],
                'budget' => $data['budget'],
                'year' => $data['year'],
                'location_id' => $data['location_id'],
            ]);

            if (isset($data['images'])) {
                $images = $this->uploadFile($data['images'], "child-protection-activities/{$childProtectionActivity->id}");
                $childProtectionActivity->images()->createMany($images);
            }

            if (isset($data['documents'])) {
                $documents = $this->uploadFile($data['documents'], "child-protection-activities/{$childProtectionActivity->id}", 'documents');
                $childProtectionActivity->images()->createMany($documents);
            }
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat memperbarui kegiatan perlindungan anak. Silahkan coba lagi.'));
        }

        DB::commit();

        return $childProtectionActivity;
    }

    /**
     * @param  ChildProtectionActivity  $childProtectionActivity
     * @return ChildProtectionActivity
     *
     * @throws GeneralException
     */
    public function delete(ChildProtectionActivity $childProtectionActivity): ChildProtectionActivity
    {
        if ($this->deleteById($childProtectionActivity->id)) {
            return $childProtectionActivity;
        }

        throw new GeneralException('Terjadi kesalahan saat menghapus kegiatan perlindungan anak. Silahkan coba lagi.');
    }

    /**
     * @param  ChildProtectionActivity  $childProtectionActivity
     * @return ChildProtectionActivity
     *
     * @throws GeneralException
     */
    public function restore(ChildProtectionActivity $childProtectionActivity): ChildProtectionActivity
    {
        if ($childProtectionActivity->restore()) {
            return $childProtectionActivity;
        }

        throw new GeneralException(__('Terjadi kesalahan saat mengembalikan kegiatan perlindungan anak. Silahkan coba lagi.'));
    }

    /**
     * @param  ChildProtectionActivity  $childProtectionActivity
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(ChildProtectionActivity $childProtectionActivity): bool
    {
        if ($childProtectionActivity->images) {
            $childProtectionActivity->images()->delete();
        }
        if ($childProtectionActivity->documents) {
            $childProtectionActivity->documents()->delete();
        }
        \Storage::deleteDirectory("child-protection-activities/{$childProtectionActivity->id}");
        if ($childProtectionActivity->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('Terjadi kesalahan saat menghapus secara permanan kegiatan perlindungan anak. Silahkan coba lagi.'));
    }

    /**
     * @param  array  $data
     * @return ChildProtectionActivity
     */
    protected function createChildProtectionActivity(array $data = []): ChildProtectionActivity
    {
        return $this->model::create([
            'company_name' => $data['company_name'] ?? null,
            'source_of_fund_id' => $data['source_of_fund_id'] ?? null,
            'activity_name' => $data['activity_name'] ?? null,
            'activity_type_id' => $data['activity_type_id'] ?? null,
            'target' => $data['target'] ?? null,
            'budget' => $data['budget'] ?? null,
            'year' => $data['year'] ?? null,
            'location_id' => $data['location_id'] ?? null,
        ]);
    }
}
