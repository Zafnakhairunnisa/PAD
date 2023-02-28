<?php

namespace Database\Seeders;

use Database\Seeders\AnakAids\AnakAidsRecapitulationCategorySeeder;
use Database\Seeders\AnakBerhadapanHukum\AnakBerhadapanHukumRecapitulationCategorySeeder;
use Database\Seeders\AnakKorbanTerorisme\AnakKorbanTerorismeRecapitulationCategorySeeder;
use Database\Seeders\Bapas\BapasRecapitulationCategorySeeder;
use Database\Seeders\Bprs\BprsRecapitulationCategorySeeder;
use Database\Seeders\BreastFeeding\BreastFeedingRecapitulationCategorySeeder;
use Database\Seeders\ChildFriendlyPlayroom\ChildFriendlyPlayroomCategorySeeder;
use Database\Seeders\ChildNutrition\ChildNutritionRecapitulationCategorySeeder;
use Database\Seeders\ChildProtectionActivity\ChildProtectionActivityRecapitulationSeeder;
use Database\Seeders\ChildProtectionActivity\ChildProtectionActivitySourceOfFundsSeeder;
use Database\Seeders\ChildProtectionActivity\ChildProtectionActivityTypeSeeder;
use Database\Seeders\ChildWelfareInstitution\ChildWelfareInstitutionCategorySeeder;
use Database\Seeders\ChildWelfareInstitution\ChildWelfareInstitutionRecapitulationCategorySeeder;
use Database\Seeders\Education\EducationRecapitulationCategorySeeder;
use Database\Seeders\FamilyConsultancy\FamilyConsultancyCategorySeeder;
use Database\Seeders\Kejaksaan\KejaksaanRecapitulationCategorySeeder;
use Database\Seeders\KekerasanTerhadapAnak\KekerasanTerhadapAnakRecapitulationCategorySeeder;
use Database\Seeders\Kelembagaan\SatgasPPA\SatgasPPARecapitulationSeeder;
use Database\Seeders\Kelembagaan\SatgasPPA\SatgasPPASeeder;
use Database\Seeders\Lpka\LpkaRecapitulationCategorySeeder;
use Database\Seeders\MedicalFacility\MedicalFacilityCategorySeeder;
use Database\Seeders\MedicalFacility\MedicalFacilityRecapitulationCategorySeeder;
use Database\Seeders\PaudHi\PaudHiCategorySeeder;
use Database\Seeders\Peksos\PeksosRecapitulationCategorySeeder;
use Database\Seeders\Pengadilan\PengadilanRecapitulationCategorySeeder;
use Database\Seeders\PerlindunganKhususAnak\PerlindunganKhususAnakRecapitulationCategorySeeder;
use Database\Seeders\PolisiDiy\PolisiDiyRecapitulationCategorySeeder;
use Database\Seeders\PusatKreatifitasAnak\PusatKreatifitasAnakRecapitulationCategorySeeder;
use Database\Seeders\RumahIbadahRamahAnak\RumahIbadahRamahAnakRecapitulationCategorySeeder;
use Database\Seeders\Sanitation\SanitationRecapitulationCategorySeeder;
use Database\Seeders\Kelurahan\KelurahanRecapitulationCategorySeeder;
use Database\Seeders\Kapanewon\KapanewonRecapitulationCategorySeeder;
use Database\Seeders\Patbm\PatbmRecapitulationCategorySeeder;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder.
 */
class DatabaseSeeder extends Seeder
{
    use TruncateTable;

    /**
     * Seed the application's database.
     */
    public function run()
    {
        Model::unguard();

        $this->truncateMultiple([
            'activity_log',
            'failed_jobs',
        ]);

        $this->call(AuthSeeder::class);
        $this->call(AnnouncementSeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(MediaTypeSeeder::class);
        $this->call(RegulationSeeder::class);
        $this->call(RegulationRecapitulationSeeder::class);
        $this->call(ChildProtectionIndexSeeder::class);

        $this->call(ChildProtectionActivityTypeSeeder::class);
        $this->call(ChildProtectionActivitySourceOfFundsSeeder::class);
        $this->call(ChildProtectionActivityRecapitulationSeeder::class);

        $this->call(SatgasPPASeeder::class);
        $this->call(SatgasPPARecapitulationSeeder::class);

        $this->call(FamilyConsultancyCategorySeeder::class);
        $this->call(PaudHiCategorySeeder::class);
        $this->call(ChildFriendlyPlayroomCategorySeeder::class);
        $this->call(ChildWelfareInstitutionCategorySeeder::class);
        $this->call(ChildWelfareInstitutionRecapitulationCategorySeeder::class);
        $this->call(ChildNutritionRecapitulationCategorySeeder::class);
        $this->call(BreastFeedingRecapitulationCategorySeeder::class);
        $this->call(MedicalFacilityRecapitulationCategorySeeder::class);
        $this->call(MedicalFacilityCategorySeeder::class);
        $this->call(SanitationRecapitulationCategorySeeder::class);
        $this->call(EducationRecapitulationCategorySeeder::class);
        $this->call(PusatKreatifitasAnakRecapitulationCategorySeeder::class);
        $this->call(RumahIbadahRamahAnakRecapitulationCategorySeeder::class);
        $this->call(KekerasanTerhadapAnakRecapitulationCategorySeeder::class);
        $this->call(PerlindunganKhususAnakRecapitulationCategorySeeder::class);
        $this->call(AnakBerhadapanHukumRecapitulationCategorySeeder::class);
        $this->call(AnakKorbanTerorismeRecapitulationCategorySeeder::class);
        $this->call(AnakAidsRecapitulationCategorySeeder::class);
        $this->call(BprsRecapitulationCategorySeeder::class);
        $this->call(LpkaRecapitulationCategorySeeder::class);
        $this->call(PolisiDiyRecapitulationCategorySeeder::class);
        $this->call(KejaksaanRecapitulationCategorySeeder::class);
        $this->call(PengadilanRecapitulationCategorySeeder::class);
        $this->call(BapasRecapitulationCategorySeeder::class);
        $this->call(PeksosRecapitulationCategorySeeder::class);
        $this->call(KelurahanRecapitulationCategorySeeder::class);
        $this->call(KapanewonRecapitulationCategorySeeder::class);
        $this->call(PatbmRecapitulationCategorySeeder::class);

        Model::reguard();
    }
}
