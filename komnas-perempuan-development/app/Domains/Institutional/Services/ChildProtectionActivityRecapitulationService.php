<?php

namespace App\Domains\Institutional\Services;

use App\Domains\Institutional\Models\ChildProtectionActivityRecapitulations;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class ChildProtectionActivityRecapitulationService.
 */
class ChildProtectionActivityRecapitulationService extends BaseService
{
    /**
     * ChildProtectionActivityRecapitulationService constructor.
     *
     * @param  ChildProtectionActivityRecapitulations  $recapitulation
     */
    public function __construct(ChildProtectionActivityRecapitulations $recapitulation)
    {
        $this->model = $recapitulation;
    }

    /**
     * @param  array  $data
     * @return ChildProtectionActivityRecapitulations
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): ChildProtectionActivityRecapitulations
    {
        DB::beginTransaction();

        try {
            $recapitulation = $this->createChildProtectionActivity([
                'company_count' => $data['company_count'],
                'source_of_fund_apbd' => $data['source_of_fund_apbd'],
                'source_of_fund_csr' => $data['source_of_fund_csr'],
                'budget_amount' => $data['budget_amount'],
                'year' => $data['year'],
                'location_id' => $data['location_id'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat membuat rekapitulasi kegiatan perlindungan anak. Silahkan coba lagi.'));
        }

        DB::commit();

        return $recapitulation;
    }

    /**
     * @param  ChildProtectionActivityRecapitulations  $recapitulation
     * @param  array  $data
     * @return ChildProtectionActivityRecapitulations
     *
     * @throws \Throwable
     */
    public function update(ChildProtectionActivityRecapitulations $recapitulation, array $data = []): ChildProtectionActivityRecapitulations
    {
        DB::beginTransaction();

        try {
            $recapitulation->update([
                'company_count' => $data['company_count'],
                'source_of_fund_apbd' => $data['source_of_fund_apbd'],
                'source_of_fund_csr' => $data['source_of_fund_csr'],
                'budget_amount' => $data['budget_amount'],
                'year' => $data['year'],
                'location_id' => $data['location_id'],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('Terjadi kesalahan saat memperbarui rekapitulasi kegiatan perlindungan anak. Silahkan coba lagi.'));
        }

        DB::commit();

        return $recapitulation;
    }

    /**
     * @param  ChildProtectionActivityRecapitulations  $recapitulation
     * @return ChildProtectionActivityRecapitulations
     *
     * @throws GeneralException
     */
    public function delete(ChildProtectionActivityRecapitulations $recapitulation): ChildProtectionActivityRecapitulations
    {
        if ($this->deleteById($recapitulation->id)) {
            return $recapitulation;
        }

        throw new GeneralException('Terjadi kesalahan saat menghapus rekapitulasi kegiatan perlindungan anak. Silahkan coba lagi.');
    }

    /**
     * @param  ChildProtectionActivityRecapitulations  $recapitulation
     * @return ChildProtectionActivityRecapitulations
     *
     * @throws GeneralException
     */
    public function restore(ChildProtectionActivityRecapitulations $recapitulation): ChildProtectionActivityRecapitulations
    {
        if ($recapitulation->restore()) {
            return $recapitulation;
        }

        throw new GeneralException(__('Terjadi kesalahan saat mengembalikan rekapitulasi kegiatan perlindungan anak. Silahkan coba lagi.'));
    }

    /**
     * @param  ChildProtectionActivityRecapitulations  $recapitulation
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(ChildProtectionActivityRecapitulations $recapitulation): bool
    {
        if ($recapitulation->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('Terjadi kesalahan saat menghapus secara permanan rekapitulasi kegiatan perlindungan anak. Silahkan coba lagi.'));
    }

    /**
     * @param  array  $data
     * @return ChildProtectionActivityRecapitulations
     */
    protected function createChildProtectionActivity(array $data = []): ChildProtectionActivityRecapitulations
    {
        return $this->model::create([
            'company_count' => \Str::replace('.', '', $data['company_count']) ?? null,
            'source_of_fund_apbd' => $data['source_of_fund_apbd'] ?? 0,
            'source_of_fund_csr' => $data['source_of_fund_csr'] ?? 0,
            'budget_amount' => $data['budget_amount'] ?? 0,
            'year' => $data['year'] ?? null,
            'location_id' => $data['location_id'] ?? null,
        ]);
    }
}
