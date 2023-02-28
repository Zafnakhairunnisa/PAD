<?php

namespace App\Domains\Cluster2\Services\ChildWelfareInstitution;

use App\Domains\Cluster2\Models\ChildWelfareInstitution\ChildWelfareInstitutionRecapitulation;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class ChildWelfareInstitutionRecapitulationService.
 */
class ChildWelfareInstitutionRecapitulationService extends BaseService
{
    /**
     * ChildWelfareInstitutionRecapitulationService constructor.
     *
     * @param  ChildWelfareInstitutionRecapitulation  $recapitulation
     */
    public function __construct(ChildWelfareInstitutionRecapitulation $recapitulation)
    {
        $this->model = $recapitulation;
    }

    /**
     * @param  array  $data
     * @return ChildWelfareInstitutionRecapitulation
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): ChildWelfareInstitutionRecapitulation
    {
        DB::beginTransaction();

        try {
            $recapitulation = $this->createChildWelfareInstitutionRecapitulation(
                $this->createData([
                    'category_id' => $data['category_id'],
                    'location_id' => $data['location_id'],
                    'value' => $data['value'],
                    'year' => $data['year'],
                ]));
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('create_error :subject', [
                'subject' => 'rekapitulasi lembaga kesejahteraan sosial anak',
            ]));
        }

        DB::commit();

        return $recapitulation;
    }

    /**
     * @param  ChildWelfareInstitutionRecapitulation  $recapitulation
     * @param  array  $data
     * @return ChildWelfareInstitutionRecapitulation
     *
     * @throws \Throwable
     */
    public function update(
        ChildWelfareInstitutionRecapitulation $recapitulation,
        array $data = []
        ): ChildWelfareInstitutionRecapitulation {
        DB::beginTransaction();

        try {
            $recapitulation->update($this->createData([
                'category_id' => $data['category_id'],
                'location_id' => $data['location_id'],
                'value' => $data['value'],
                'year' => $data['year'],
            ]));
        } catch (Exception $e) {
            DB::rollBack();

            throw new GeneralException(__('update_error :subject', [
                'subject' => 'rekapitulasi lembaga kesejahteraan sosial anak',
            ]));
        }

        DB::commit();

        return $recapitulation;
    }

    /**
     * @param  ChildWelfareInstitutionRecapitulation  $recapitulation
     * @return ChildWelfareInstitutionRecapitulation
     *
     * @throws GeneralException
     */
    public function delete(
        ChildWelfareInstitutionRecapitulation $recapitulation
        ): ChildWelfareInstitutionRecapitulation {
        if ($this->deleteById($recapitulation->id)) {
            return $recapitulation;
        }

        throw new GeneralException(__('delete_error :subject', [
            'subject' => 'rekapitulasi lembaga kesejahteraan sosial anak',
        ]));
    }

    /**
     * @param  ChildWelfareInstitutionRecapitulation  $recapitulation
     * @return ChildWelfareInstitutionRecapitulation
     *
     * @throws GeneralException
     */
    public function restore(
        ChildWelfareInstitutionRecapitulation $recapitulation
        ): ChildWelfareInstitutionRecapitulation {
        if ($recapitulation->restore()) {
            return $recapitulation;
        }

        throw new GeneralException(__('restore_error :subject', [
            'subject' => 'rekapitulasi lembaga kesejahteraan sosial anak',
        ]));
    }

    /**
     * @param  ChildWelfareInstitutionRecapitulation  $recapitulation
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(ChildWelfareInstitutionRecapitulation $recapitulation): bool
    {
        if ($recapitulation->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('force_delete_error :subject', [
            'subject' => 'rekapitulasi lembaga kesejahteraan sosial anak',
        ]));
    }

    /**
     * @param  array  $data
     * @return ChildWelfareInstitutionRecapitulation
     */
    protected function createChildWelfareInstitutionRecapitulation(
        array $data = []
        ): ChildWelfareInstitutionRecapitulation {
        return $this->model::create($data);
    }

    private function createData(array $data)
    {
        return [
            'category_id' => $data['category_id'] ?? null,
            'location_id' => $data['location_id'] ?? null,
            'value' => $data['value'] ?? null,
            'year' => $data['year'] ?? null,
        ];
    }
}
