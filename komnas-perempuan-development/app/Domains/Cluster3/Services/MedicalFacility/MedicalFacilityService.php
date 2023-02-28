<?php

namespace App\Domains\Cluster3\Services\MedicalFacility;

use App\Domains\Cluster3\Models\MedicalFacility\MedicalFacility;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use Exception;
use Illuminate\Support\Facades\DB;

/**
 * Class MedicalFacilityService.
 */
class MedicalFacilityService extends BaseService
{
    private $subjectMessage = 'fasilitas kesehatan ramah anak';

    /**
     * MedicalFacilityService constructor.
     *
     * @param  MedicalFacility  $medicalFacility
     */
    public function __construct(MedicalFacility $medicalFacility)
    {
        $this->model = $medicalFacility;
    }

    /**
     * @param  array  $data
     * @return MedicalFacility
     *
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = []): MedicalFacility
    {
        DB::beginTransaction();

        try {
            $medicalFacility = $this->createMedicalFacility($data);
        } catch (Exception $e) {
            DB::rollBack();
            report($e);

            throw new GeneralException(__('create_error :subject', [
                'subject' => $this->subjectMessage,
            ]));
        }

        DB::commit();

        return $medicalFacility;
    }

    /**
     * @param  MedicalFacility  $medicalFacility
     * @param  array  $data
     * @return MedicalFacility
     *
     * @throws \Throwable
     */
    public function update(
        MedicalFacility $medicalFacility,
        array $data = []
    ): MedicalFacility {
        DB::beginTransaction();

        try {
            $medicalFacility->update($this->createData($data));
        } catch (Exception $e) {
            DB::rollBack();
            report($e);

            throw new GeneralException(__('update_error :subject', [
                'subject' => $this->subjectMessage,
            ]));
        }

        DB::commit();

        return $medicalFacility;
    }

    /**
     * @param  MedicalFacility  $medicalFacility
     * @return MedicalFacility
     *
     * @throws GeneralException
     */
    public function delete(
        MedicalFacility $medicalFacility
        ): MedicalFacility {
        if ($this->deleteById($medicalFacility->id)) {
            return $medicalFacility;
        }

        throw new GeneralException(__('delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  MedicalFacility  $medicalFacility
     * @return MedicalFacility
     *
     * @throws GeneralException
     */
    public function restore(
        MedicalFacility $medicalFacility
        ): MedicalFacility {
        if ($medicalFacility->restore()) {
            return $medicalFacility;
        }

        throw new GeneralException(__('restore_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  MedicalFacility  $medicalFacility
     * @return bool
     *
     * @throws GeneralException
     */
    public function destroy(MedicalFacility $medicalFacility): bool
    {
        if ($medicalFacility->forceDelete()) {
            return true;
        }

        throw new GeneralException(__('force_delete_error :subject', [
            'subject' => $this->subjectMessage,
        ]));
    }

    /**
     * @param  array  $data
     * @return MedicalFacility
     */
    protected function createMedicalFacility(
        array $data = []
        ): MedicalFacility {
        return $this->model::create($this->createData($data));
    }

    /**
     * @param  array  $data
     * @return array
     */
    private function createData(array $data = []): array
    {
        return [
            'nama' => $data['nama'] ?? null,
            'surat_keterangan' => $data['surat_keterangan'] ?? null,
            'year' => $data['year'] ?? null,
            'category_id' => $data['category_id'] ?? null,
            'alamat' => $data['alamat'] ?? null,
            'kalurahan' => $data['kalurahan'] ?? null,
            'kapanewon' => $data['kapanewon'] ?? null,
            'location_id' => $data['location_id'] ?? null,
            'provinsi' => $data['provinsi'] ?? null,
            'sdm_terlatih' => $data['sdm_terlatih'] ?? null,
            'pusat_informasi' => $data['pusat_informasi'] ?? null,
            'ruang_pelayanan' => $data['ruang_pelayanan'] ?? null,
            'ruang_bermain_ramah_anak' => $data['ruang_bermain_ramah_anak'] ?? null,
            'ruang_laktasi' => $data['ruang_laktasi'] ?? null,
            'kawasan_tanpa_rokok' => $data['kawasan_tanpa_rokok'] ?? null,
            'sanitasi_sesuai_standar' => $data['sanitasi_sesuai_standar'] ?? null,
            'sarpras_ramah_disabilitas' => $data['sarpras_ramah_disabilitas'] ?? null,
            'cakupan_bayi' => $data['cakupan_bayi'] ?? null,
            'pelayanan_konseling' => $data['pelayanan_konseling'] ?? null,
            'tata_laksana' => $data['tata_laksana'] ?? null,
            'jumlah_anak' => $data['jumlah_anak'] ?? null,
            'informasi_hak_anak' => $data['informasi_hak_anak'] ?? null,
            'mekanisme_suara_anak' => $data['mekanisme_suara_anak'] ?? null,
            'pelayanan_penjangkauan' => $data['pelayanan_penjangkauan'] ?? null,
        ];
    }
}
