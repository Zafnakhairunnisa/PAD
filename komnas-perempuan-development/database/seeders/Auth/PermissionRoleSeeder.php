<?php

namespace Database\Seeders\Auth;

use App\Domains\Auth\Models\Permission;
use App\Domains\Auth\Models\Role;
use App\Domains\Auth\Models\User;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;

/**
 * Class PermissionRoleTableSeeder.
 */
class PermissionRoleSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Create Roles
        Role::create([
            'id' => 1,
            'type' => User::TYPE_ADMIN,
            'name' => 'Administrator',
        ]);

        // Non Grouped Permissions
        //

        // Grouped permissions
        // Users category
        $users = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.access.user',
            'description' => 'All User Permissions',
        ]);

        $users->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.user.list',
                'description' => 'View Users',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.user.deactivate',
                'description' => 'Deactivate Users',
                'sort' => 2,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.user.reactivate',
                'description' => 'Reactivate Users',
                'sort' => 3,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.user.clear-session',
                'description' => 'Clear User Sessions',
                'sort' => 4,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.user.impersonate',
                'description' => 'Impersonate Users',
                'sort' => 5,
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.access.user.change-password',
                'description' => 'Change User Passwords',
                'sort' => 6,
            ]),
        ]);

        // Regulation category
        $regulations = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.institutional.regulation',
            'description' => 'All Regulation Permissions',
        ]);

        $regulations->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.institutional.regulation.list',
                'description' => 'View Regulations',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.institutional.regulation.delete',
                'description' => 'Delete Regulation',
                'sort' => 2,
            ]),
        ]);

        $regulationRecapitulation = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.institutional.regulation.recapitulation',
            'description' => 'All Regulation Recapitulation Permissions',
        ]);

        $regulationRecapitulation->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.institutional.regulation.recapitulation.list',
                'description' => 'View Regulations Recapitulation',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.institutional.regulation.recapitulation.delete',
                'description' => 'Delete Regulation Recapitulation',
                'sort' => 2,
            ]),
        ]);

        $childProtectionIndices = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.institutional.child_protection_index',
            'description' => 'Semua Izin Indeks Perlindungan Anak',
        ]);

        $childProtectionIndices->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.institutional.child_protection_index.list',
                'description' => 'Lihat Indeks Perlindungan Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.institutional.child_protection_index.create',
                'description' => 'Buat Indeks Perlindungan Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.institutional.child_protection_index.delete',
                'description' => 'Hapus Indeks Perlindungan Anak',
            ]),

            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.institutional.child_protection_index.recapitulation.list',
                'description' => 'Lihat Rekapitulasi Indeks Perlindungan Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.institutional.child_protection_index.recapitulation.create',
                'description' => 'Buat Rekapitulasi Indeks Perlindungan Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.institutional.child_protection_index.recapitulation.delete',
                'description' => 'Hapus Rekapitulasi Indeks Perlindungan Anak',
            ]),
        ]);

        $childProtectionActivity = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.institutional.child_protection_activities',
            'description' => 'Semua Izin Kegiatan Perlindungan Anak',
        ]);

        $childProtectionActivity->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.institutional.child_protection_activities.list',
                'description' => 'Lihat Kegiatan Perlindungan Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.institutional.child_protection_activities.create',
                'description' => 'Buat Kegiatan Perlindungan Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.institutional.child_protection_activities.delete',
                'description' => 'Hapus Kegiatan Perlindungan Anak',
            ]),

            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.institutional.child_protection_activities.recapitulation.list',
                'description' => 'Lihat Rekapitulasi Kegiatan Perlindungan Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.institutional.child_protection_activities.recapitulation.create',
                'description' => 'Buat Rekapitulasi Kegiatan Perlindungan Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.institutional.child_protection_activities.recapitulation.delete',
                'description' => 'Hapus Rekapitulasi Kegiatan Perlindungan Anak',
            ]),
        ]);

        $satgasPPA = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.institutional.satgas_ppa',
            'description' => 'Semua Izin Satgas PPA',
        ]);

        $satgasPPA->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.institutional.satgas_ppa.list',
                'description' => 'Lihat Satgas PPA',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.institutional.satgas_ppa.create',
                'description' => 'Buat Satgas PPA',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.institutional.satgas_ppa.delete',
                'description' => 'Hapus Satgas PPA',
            ]),

            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.institutional.satgas_ppa.recapitulation.list',
                'description' => 'Lihat Rekapitulasi Satgas PPA',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.institutional.satgas_ppa.recapitulation.create',
                'description' => 'Buat Rekapitulasi Satgas PPA',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.institutional.satgas_ppa.recapitulation.delete',
                'description' => 'Hapus Rekapitulasi Satgas PPA',
            ]),
        ]);

        $childForum = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.institutional.child_forum',
            'description' => 'Semua Izin Forum Anak',
        ]);

        $childForum->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.institutional.child_forum.list',
                'description' => 'Lihat Forum Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.institutional.child_forum.create',
                'description' => 'Buat Forum Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.institutional.child_forum.delete',
                'description' => 'Hapus Forum Anak',
            ]),

            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.institutional.child_forum.recapitulation.list',
                'description' => 'Lihat Rekapitulasi Forum Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.institutional.child_forum.recapitulation.create',
                'description' => 'Buat Rekapitulasi Forum Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.institutional.child_forum.recapitulation.delete',
                'description' => 'Hapus Rekapitulasi Forum Anak',
            ]),
        ]);

        $childCareOrg = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.institutional.child_care_org',
            'description' => 'Semua Izin Organisasi Peduli Anak',
        ]);

        $childCareOrg->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.institutional.child_care_org.list',
                'description' => 'Lihat Organisasi Peduli Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.institutional.child_care_org.create',
                'description' => 'Buat Organisasi Peduli Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.institutional.child_care_org.delete',
                'description' => 'Hapus Organisasi Peduli Anak',
            ]),

            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.institutional.child_care_org.recapitulation.list',
                'description' => 'Lihat Rekapitulasi Organisasi Peduli Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.institutional.child_care_org.recapitulation.create',
                'description' => 'Buat Rekapitulasi Organisasi Peduli Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.institutional.child_care_org.recapitulation.delete',
                'description' => 'Hapus Rekapitulasi Organisasi Peduli Anak',
            ]),
        ]);

        $childCareOrg = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.institutional.child_media',
            'description' => 'Semua Izin Media Massa Sahabat Anak',
        ]);

        $childCareOrg->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.institutional.child_media.list',
                'description' => 'Lihat Media Massa Sahabat Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.institutional.child_media.create',
                'description' => 'Buat Media Massa Sahabat Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.institutional.child_media.delete',
                'description' => 'Hapus Media Massa Sahabat Anak',
            ]),

            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.institutional.child_media.recapitulation.list',
                'description' => 'Lihat Rekapitulasi Media Massa Sahabat Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.institutional.child_media.recapitulation.create',
                'description' => 'Buat Rekapitulasi Media Massa Sahabat Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.institutional.child_media.recapitulation.delete',
                'description' => 'Hapus Rekapitulasi Media Massa Sahabat Anak',
            ]),
        ]);

        $birthCertificate = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.cluster_1.birt_certificate',
            'description' => 'Semua Izin Akta Kelahiran',
        ]);

        $birthCertificate->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_1.birt_certificate.list',
                'description' => 'Lihat Akta Kelahiran',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_1.birt_certificate.create',
                'description' => 'Buat Akta Kelahiran',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_1.birt_certificate.delete',
                'description' => 'Hapus Akta Kelahiran',
            ]),
        ]);

        $childIdentityCard = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.cluster_1.child_identity_card',
            'description' => 'Semua Izin Kepemilikan Kartu Identitas Anak',
        ]);

        $childIdentityCard->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_1.child_identity_card.list',
                'description' => 'Lihat Kepemilikan Kartu Identitas Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_1.child_identity_card.create',
                'description' => 'Buat Kepemilikan Kartu Identitas Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_1.child_identity_card.delete',
                'description' => 'Hapus Kepemilikan Kartu Identitas Anak',
            ]),
        ]);

        $library = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.cluster_1.library',
            'description' => 'Semua Izin Indeks Perlindungan Anak',
        ]);

        $library->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_1.library.list',
                'description' => 'Lihat Perpustakaan dan Taman Bacaan',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_1.library.create',
                'description' => 'Buat Perpustakaan dan Taman Bacaan',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_1.library.delete',
                'description' => 'Hapus Perpustakaan dan Taman Bacaan',
            ]),
        ]);

        $perkawinanAnak = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.cluster_2.perkawinan_anak',
            'description' => 'Semua Izin Perkawinan Anak',
        ]);

        $perkawinanAnak->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_2.perkawinan_anak.list',
                'description' => 'Lihat Perkawinan Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_2.perkawinan_anak.create',
                'description' => 'Buat Perkawinan Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_2.perkawinan_anak.delete',
                'description' => 'Hapus Perkawinan Anak',
            ]),
        ]);

        $familyConsultancy = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.cluster_2.family_consultancy',
            'description' => 'Semua Izin Lembaga Konsultasi Keluarga',
        ]);

        $familyConsultancy->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_2.family_consultancy.list',
                'description' => 'Lihat Lembaga Konsultasi Keluarga',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_2.family_consultancy.create',
                'description' => 'Buat Lembaga Konsultasi Keluarga',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_2.family_consultancy.delete',
                'description' => 'Hapus Lembaga Konsultasi Keluarga',
            ]),

            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_2.family_consultancy.recapitulation.list',
                'description' => 'Lihat Rekapitulasi Lembaga Konsultasi Keluarga',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_2.family_consultancy.recapitulation.create',
                'description' => 'Buat Rekapitulasi Lembaga Konsultasi Keluarga',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_2.family_consultancy.recapitulation.delete',
                'description' => 'Hapus Rekapitulasi Lembaga Konsultasi Keluarga',
            ]),
        ]);

        $paudHi = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.cluster_2.paud_hi',
            'description' => 'Semua Izin PAUD HI',
        ]);

        $paudHi->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_2.paud_hi.recapitulation.list',
                'description' => 'Lihat Rekapitulasi PAUD HI',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_2.paud_hi.recapitulation.create',
                'description' => 'Buat Rekapitulasi PAUD HI',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_2.paud_hi.recapitulation.delete',
                'description' => 'Hapus Rekapitulasi PAUD HI',
            ]),
        ]);

        $childFriendlyPlayroom = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.cluster_2.child_friendly_playroom',
            'description' => 'Semua Izin Ruang Bermain Ramah Anak',
        ]);

        $childFriendlyPlayroom->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_2.child_friendly_playroom.list',
                'description' => 'Lihat Ruang Bermain Ramah Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_2.child_friendly_playroom.create',
                'description' => 'Buat Ruang Bermain Ramah Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_2.child_friendly_playroom.delete',
                'description' => 'Hapus Ruang Bermain Ramah Anak',
            ]),

            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_2.child_friendly_playroom.recapitulation.list',
                'description' => 'Lihat Rekapitulasi Ruang Bermain Ramah Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_2.child_friendly_playroom.recapitulation.create',
                'description' => 'Buat Rekapitulasi Ruang Bermain Ramah Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_2.child_friendly_playroom.recapitulation.delete',
                'description' => 'Hapus Rekapitulasi Ruang Bermain Ramah Anak',
            ]),
        ]);

        $childWelfareInstitution = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.cluster_2.child_welfare_institution',
            'description' => 'Semua Izin Lembaga Kesejahteraan Sosial Anak',
        ]);

        $childWelfareInstitution->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_2.child_welfare_institution.list',
                'description' => 'Lihat Lembaga Kesejahteraan Sosial Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_2.child_welfare_institution.create',
                'description' => 'Buat Lembaga Kesejahteraan Sosial Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_2.child_welfare_institution.delete',
                'description' => 'Hapus Lembaga Kesejahteraan Sosial Anak',
            ]),

            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_2.child_welfare_institution.recapitulation.list',
                'description' => 'Lihat Rekapitulasi Lembaga Kesejahteraan Sosial Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_2.child_welfare_institution.recapitulation.create',
                'description' => 'Buat Rekapitulasi Lembaga Kesejahteraan Sosial Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_2.child_welfare_institution.recapitulation.delete',
                'description' => 'Hapus Rekapitulasi Lembaga Kesejahteraan Sosial Anak',
            ]),
        ]);

        // Cluster 3
        $childBirth = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.cluster_3.child_birth',
            'description' => 'Semua Izin Persalinan di Fasilitas Kesehatan',
        ]);

        $childBirth->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.child_birth.list',
                'description' => 'Lihat Persalinan di Fasilitas Kesehatan',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.child_birth.create',
                'description' => 'Buat Persalinan di Fasilitas Kesehatan',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.child_birth.delete',
                'description' => 'Hapus Persalinan di Fasilitas Kesehatan',
            ]),

            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.child_birth.recapitulation.list',
                'description' => 'Lihat Rekapitulasi Persalinan di Fasilitas Kesehatan',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.child_birth.recapitulation.create',
                'description' => 'Buat Rekapitulasi Persalinan di Fasilitas Kesehatan',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.child_birth.recapitulation.delete',
                'description' => 'Hapus Rekapitulasi Persalinan di Fasilitas Kesehatan',
            ]),
        ]);

        $motherDaughterCard = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.cluster_3.mother_and_daughter_card',
            'description' => 'Semua Izin Kartu Ibu dan Anak',
        ]);

        $motherDaughterCard->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.mother_and_daughter_card.list',
                'description' => 'Lihat Kartu Ibu dan Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.mother_and_daughter_card.create',
                'description' => 'Buat Kartu Ibu dan Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.mother_and_daughter_card.delete',
                'description' => 'Hapus Kartu Ibu dan Anak',
            ]),

            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.mother_and_daughter_card.recapitulation.list',
                'description' => 'Lihat Rekapitulasi Kartu Ibu dan Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.mother_and_daughter_card.recapitulation.create',
                'description' => 'Buat Rekapitulasi Kartu Ibu dan Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.mother_and_daughter_card.recapitulation.delete',
                'description' => 'Hapus Rekapitulasi Kartu Ibu dan Anak',
            ]),
        ]);

        $immunization = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.cluster_3.immunization',
            'description' => 'Semua Izin Imunisasi',
        ]);

        $immunization->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.immunization.list',
                'description' => 'Lihat Imunisasi',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.immunization.create',
                'description' => 'Buat Imunisasi',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.immunization.delete',
                'description' => 'Hapus Imunisasi',
            ]),

            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.immunization.recapitulation.list',
                'description' => 'Lihat Rekapitulasi Imunisasi',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.immunization.recapitulation.create',
                'description' => 'Buat Rekapitulasi Imunisasi',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.immunization.recapitulation.delete',
                'description' => 'Hapus Rekapitulasi Imunisasi',
            ]),
        ]);

        $infantMortality = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.cluster_3.infant_mortality',
            'description' => 'Semua Izin Angka Kematian Bayi',
        ]);

        $infantMortality->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.infant_mortality.list',
                'description' => 'Lihat Angka Kematian Bayi',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.infant_mortality.create',
                'description' => 'Buat Angka Kematian Bayi',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.infant_mortality.delete',
                'description' => 'Hapus Angka Kematian Bayi',
            ]),

            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.infant_mortality.recapitulation.list',
                'description' => 'Lihat Rekapitulasi Angka Kematian Bayi',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.infant_mortality.recapitulation.create',
                'description' => 'Buat Rekapitulasi Angka Kematian Bayi',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.infant_mortality.recapitulation.delete',
                'description' => 'Hapus Rekapitulasi Angka Kematian Bayi',
            ]),
        ]);

        $maternalDeath = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.cluster_3.maternal_death',
            'description' => 'Semua Izin Angka Kematian Ibu Melahirkan',
        ]);

        $maternalDeath->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.maternal_death.list',
                'description' => 'Lihat Angka Kematian Ibu Melahirkan',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.maternal_death.create',
                'description' => 'Buat Angka Kematian Ibu Melahirkan',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.maternal_death.delete',
                'description' => 'Hapus Angka Kematian Ibu Melahirkan',
            ]),

            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.maternal_death.recapitulation.list',
                'description' => 'Lihat Rekapitulasi Angka Kematian Ibu Melahirkan',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.maternal_death.recapitulation.create',
                'description' => 'Buat Rekapitulasi Angka Kematian Ibu Melahirkan',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.maternal_death.recapitulation.delete',
                'description' => 'Hapus Rekapitulasi Angka Kematian Ibu Melahirkan',
            ]),
        ]);

        $childNutrition = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.cluster_3.child_nutrition',
            'description' => 'Semua Izin Status Gizi Anak',
        ]);

        $childNutrition->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.child_nutrition.list',
                'description' => 'Lihat Status Gizi Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.child_nutrition.create',
                'description' => 'Buat Status Gizi Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.child_nutrition.delete',
                'description' => 'Hapus Status Gizi Anak',
            ]),

            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.child_nutrition.recapitulation.list',
                'description' => 'Lihat Rekapitulasi Status Gizi Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.child_nutrition.recapitulation.create',
                'description' => 'Buat Rekapitulasi Status Gizi Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.child_nutrition.recapitulation.delete',
                'description' => 'Hapus Rekapitulasi Status Gizi Anak',
            ]),
        ]);

        $breastFeeding = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.cluster_3.breast_feeding',
            'description' => 'Semua Izin Pemberian Air Susu Ibu',
        ]);

        $breastFeeding->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.breast_feeding.list',
                'description' => 'Lihat Pemberian Air Susu Ibu',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.breast_feeding.create',
                'description' => 'Buat Pemberian Air Susu Ibu',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.breast_feeding.delete',
                'description' => 'Hapus Pemberian Air Susu Ibu',
            ]),

            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.breast_feeding.recapitulation.list',
                'description' => 'Lihat Rekapitulasi Pemberian Air Susu Ibu',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.breast_feeding.recapitulation.create',
                'description' => 'Buat Rekapitulasi Pemberian Air Susu Ibu',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.breast_feeding.recapitulation.delete',
                'description' => 'Hapus Rekapitulasi Pemberian Air Susu Ibu',
            ]),
        ]);

        $medicalFacility = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.cluster_3.medical_facility',
            'description' => 'Semua Izin Fasilitas Kesehatan Ramah Anak',
        ]);

        $medicalFacility->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.medical_facility.list',
                'description' => 'Lihat Fasilitas Kesehatan Ramah Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.medical_facility.create',
                'description' => 'Buat Fasilitas Kesehatan Ramah Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.medical_facility.delete',
                'description' => 'Hapus Fasilitas Kesehatan Ramah Anak',
            ]),

            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.medical_facility.recapitulation.list',
                'description' => 'Lihat Rekapitulasi Fasilitas Kesehatan Ramah Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.medical_facility.recapitulation.create',
                'description' => 'Buat Rekapitulasi Fasilitas Kesehatan Ramah Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.medical_facility.recapitulation.delete',
                'description' => 'Hapus Rekapitulasi Fasilitas Kesehatan Ramah Anak',
            ]),
        ]);

        $sanitation = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.cluster_3.sanitation',
            'description' => 'Semua Izin Air Bersih dan Sanitasi',
        ]);

        $sanitation->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.sanitation.list',
                'description' => 'Lihat Air Bersih dan Sanitasi',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.sanitation.create',
                'description' => 'Buat Air Bersih dan Sanitasi',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.sanitation.delete',
                'description' => 'Hapus Air Bersih dan Sanitasi',
            ]),

            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.sanitation.recapitulation.list',
                'description' => 'Lihat Rekapitulasi Air Bersih dan Sanitasi',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.sanitation.recapitulation.create',
                'description' => 'Buat Rekapitulasi Air Bersih dan Sanitasi',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_3.sanitation.recapitulation.delete',
                'description' => 'Hapus Rekapitulasi Air Bersih dan Sanitasi',
            ]),
        ]);

        $education = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.cluster_4.education',
            'description' => 'Semua Izin Pendidikan',
        ]);

        $education->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_4.education.recapitulation.list',
                'description' => 'Lihat Rekapitulasi Pendidikan',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_4.education.recapitulation.create',
                'description' => 'Buat Rekapitulasi Pendidikan',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_4.education.recapitulation.delete',
                'description' => 'Hapus Rekapitulasi Pendidikan',
            ]),
        ]);

        $pusatKreatifitasAnak = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.cluster_4.pusat_kreatifitas_anak',
            'description' => 'Semua Izin Pusat Kreatifitas Anak',
        ]);

        $pusatKreatifitasAnak->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_4.pusat_kreatifitas_anak.list',
                'description' => 'Lihat Pusat Kreatifitas Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_4.pusat_kreatifitas_anak.create',
                'description' => 'Buat Pusat Kreatifitas Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_4.pusat_kreatifitas_anak.delete',
                'description' => 'Hapus Pusat Kreatifitas Anak',
            ]),

            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_4.pusat_kreatifitas_anak.recapitulation.list',
                'description' => 'Lihat Rekapitulasi Pusat Kreatifitas Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_4.pusat_kreatifitas_anak.recapitulation.create',
                'description' => 'Buat Rekapitulasi Pusat Kreatifitas Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_4.pusat_kreatifitas_anak.recapitulation.delete',
                'description' => 'Hapus Rekapitulasi Pusat Kreatifitas Anak',
            ]),
        ]);

        $rumahIbadahRamahAnak = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.cluster_4.rumah_ibadah_ramah_anak',
            'description' => 'Semua Izin Rumah Ibadah Ramah Anak',
        ]);

        $rumahIbadahRamahAnak->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_4.rumah_ibadah_ramah_anak.list',
                'description' => 'Lihat Rumah Ibadah Ramah Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_4.rumah_ibadah_ramah_anak.create',
                'description' => 'Buat Rumah Ibadah Ramah Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_4.rumah_ibadah_ramah_anak.delete',
                'description' => 'Hapus Rumah Ibadah Ramah Anak',
            ]),

            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_4.rumah_ibadah_ramah_anak.recapitulation.list',
                'description' => 'Lihat Rekapitulasi Rumah Ibadah Ramah Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_4.rumah_ibadah_ramah_anak.recapitulation.create',
                'description' => 'Buat Rekapitulasi Rumah Ibadah Ramah Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_4.rumah_ibadah_ramah_anak.recapitulation.delete',
                'description' => 'Hapus Rekapitulasi Rumah Ibadah Ramah Anak',
            ]),
        ]);

        $kekerasanTerhadapAnak = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.cluster_5.kekerasan_terhadap_anak',
            'description' => 'Semua Izin Kekerasan Terhadap Anak',
        ]);

        $kekerasanTerhadapAnak->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.kekerasan_terhadap_anak.recapitulation.list',
                'description' => 'Lihat Rekapitulasi Kekerasan Terhadap Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.kekerasan_terhadap_anak.recapitulation.create',
                'description' => 'Buat Rekapitulasi Kekerasan Terhadap Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.kekerasan_terhadap_anak.recapitulation.delete',
                'description' => 'Hapus Rekapitulasi Kekerasan Terhadap Anak',
            ]),
        ]);

        $perlindunganKhususAnak = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.cluster_5.perlindungan_khusus_anak',
            'description' => 'Semua Izin Perlindungan Khusus Anak',
        ]);

        $perlindunganKhususAnak->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.perlindungan_khusus_anak.recapitulation.list',
                'description' => 'Lihat Rekapitulasi Perlindungan Khusus Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.perlindungan_khusus_anak.recapitulation.create',
                'description' => 'Buat Rekapitulasi Perlindungan Khusus Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.perlindungan_khusus_anak.recapitulation.delete',
                'description' => 'Hapus Rekapitulasi Perlindungan Khusus Anak',
            ]),
        ]);

        $anakBerhadapanHukum = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.cluster_5.anak_berhadapan_hukum',
            'description' => 'Semua Izin Anak Berhadapan dengan Hukum',
        ]);

        $anakBerhadapanHukum->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.anak_berhadapan_hukum.recapitulation.list',
                'description' => 'Lihat Rekapitulasi Anak Berhadapan dengan Hukum',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.anak_berhadapan_hukum.recapitulation.create',
                'description' => 'Buat Rekapitulasi Anak Berhadapan dengan Hukum',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.anak_berhadapan_hukum.recapitulation.delete',
                'description' => 'Hapus Rekapitulasi Anak Berhadapan dengan Hukum',
            ]),
        ]);

        $anakKorbanTerorisme = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.cluster_5.anak_korban_terorisme',
            'description' => 'Semua Izin Anak Korban Terorisme dan Radikalisme',
        ]);

        $anakKorbanTerorisme->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.anak_korban_terorisme.recapitulation.list',
                'description' => 'Lihat Rekapitulasi Anak Korban Terorisme dan Radikalisme',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.anak_korban_terorisme.recapitulation.create',
                'description' => 'Buat Rekapitulasi Anak Korban Terorisme dan Radikalisme',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.anak_korban_terorisme.recapitulation.delete',
                'description' => 'Hapus Rekapitulasi Anak Korban Terorisme dan Radikalisme',
            ]),
        ]);

        $anakAids = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.cluster_5.anak_aids',
            'description' => 'Semua Izin Anak AIDS',
        ]);

        $anakAids->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.anak_aids.recapitulation.list',
                'description' => 'Lihat Rekapitulasi Anak AIDS',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.anak_aids.recapitulation.create',
                'description' => 'Buat Rekapitulasi Anak AIDS',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.anak_aids.recapitulation.delete',
                'description' => 'Hapus Rekapitulasi Anak AIDS',
            ]),
        ]);

        $pekerjaAnak = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.cluster_5.pekerja_anak',
            'description' => 'Semua Izin Pekerja Anak',
        ]);

        $pekerjaAnak->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.pekerja_anak.recapitulation.list',
                'description' => 'Lihat Rekapitulasi Pekerja Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.pekerja_anak.recapitulation.create',
                'description' => 'Buat Rekapitulasi Pekerja Anak',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.pekerja_anak.recapitulation.delete',
                'description' => 'Hapus Rekapitulasi Pekerja Anak',
            ]),
        ]);

        $bprs = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.cluster_5.bprs',
            'description' => 'Semua Izin Balai Perlindungan dan Rehabilitasi Sosial Remaja (BPRSR) DIY',
        ]);

        $bprs->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.bprs.list',
                'description' => 'Lihat Balai Perlindungan dan Rehabilitasi Sosial Remaja (BPRSR) DIY',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.bprs.create',
                'description' => 'Buat Balai Perlindungan dan Rehabilitasi Sosial Remaja (BPRSR) DIY',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.bprs.delete',
                'description' => 'Hapus Balai Perlindungan dan Rehabilitasi Sosial Remaja (BPRSR) DIY',
            ]),

            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.bprs.recapitulation.list',
                'description' => 'Lihat Rekapitulasi Balai Perlindungan dan Rehabilitasi Sosial Remaja (BPRSR) DIY',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.bprs.recapitulation.create',
                'description' => 'Buat Rekapitulasi Balai Perlindungan dan Rehabilitasi Sosial Remaja (BPRSR) DIY',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.bprs.recapitulation.delete',
                'description' => 'Hapus Rekapitulasi Balai Perlindungan dan Rehabilitasi Sosial Remaja (BPRSR) DIY',
            ]),
        ]);

        $lpka = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.cluster_5.lpka',
            'description' => 'Semua Izin Lembaga Pembinaan Khusus Anak Yogyakarta',
        ]);

        $lpka->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.lpka.list',
                'description' => 'Lihat Lembaga Pembinaan Khusus Anak Yogyakarta',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.lpka.create',
                'description' => 'Buat Lembaga Pembinaan Khusus Anak Yogyakarta',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.lpka.delete',
                'description' => 'Hapus Lembaga Pembinaan Khusus Anak Yogyakarta',
            ]),

            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.lpka.recapitulation.list',
                'description' => 'Lihat Rekapitulasi Lembaga Pembinaan Khusus Anak Yogyakarta',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.lpka.recapitulation.create',
                'description' => 'Buat Rekapitulasi Lembaga Pembinaan Khusus Anak Yogyakarta',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.lpka.recapitulation.delete',
                'description' => 'Hapus Rekapitulasi Lembaga Pembinaan Khusus Anak Yogyakarta',
            ]),
        ]);

        $polisi_diy = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.cluster_5.polisi_diy',
            'description' => 'Semua Izin Polisi Daerah DIY',
        ]);

        $polisi_diy->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.polisi_diy.list',
                'description' => 'Lihat Polisi Daerah DIY',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.polisi_diy.create',
                'description' => 'Buat Polisi Daerah DIY',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.polisi_diy.delete',
                'description' => 'Hapus Polisi Daerah DIY',
            ]),

            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.polisi_diy.recapitulation.list',
                'description' => 'Lihat Rekapitulasi Polisi Daerah DIY',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.polisi_diy.recapitulation.create',
                'description' => 'Buat Rekapitulasi Polisi Daerah DIY',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.polisi_diy.recapitulation.delete',
                'description' => 'Hapus Rekapitulasi Polisi Daerah DIY',
            ]),
        ]);

        $pengadilan = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.cluster_5.pengadilan',
            'description' => 'Semua Izin Pengadilan DIY',
        ]);

        $pengadilan->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.pengadilan.list',
                'description' => 'Lihat Pengadilan DIY',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.pengadilan.create',
                'description' => 'Buat Pengadilan DIY',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.pengadilan.delete',
                'description' => 'Hapus Pengadilan DIY',
            ]),

            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.pengadilan.recapitulation.list',
                'description' => 'Lihat Rekapitulasi Pengadilan DIY',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.pengadilan.recapitulation.create',
                'description' => 'Buat Rekapitulasi Pengadilan DIY',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.pengadilan.recapitulation.delete',
                'description' => 'Hapus Rekapitulasi Pengadilan DIY',
            ]),
        ]);

        $bapas = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.cluster_5.bapas',
            'description' => 'Semua Izin Balai Pemasyarakatan',
        ]);

        $bapas->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.bapas.list',
                'description' => 'Lihat Balai Pemasyarakatan',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.bapas.create',
                'description' => 'Buat Balai Pemasyarakatan',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.bapas.delete',
                'description' => 'Hapus Balai Pemasyarakatan',
            ]),

            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.bapas.recapitulation.list',
                'description' => 'Lihat Rekapitulasi Balai Pemasyarakatan',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.bapas.recapitulation.create',
                'description' => 'Buat Rekapitulasi Balai Pemasyarakatan',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.bapas.recapitulation.delete',
                'description' => 'Hapus Rekapitulasi Balai Pemasyarakatan',
            ]),
        ]);

        $peksos = Permission::create([
            'type' => User::TYPE_ADMIN,
            'name' => 'admin.cluster_5.peksos',
            'description' => 'Semua Izin Pekerja Sosial',
        ]);

        $peksos->children()->saveMany([
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.peksos.list',
                'description' => 'Lihat Pekerja Sosial',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.peksos.create',
                'description' => 'Buat Pekerja Sosial',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.peksos.delete',
                'description' => 'Hapus Pekerja Sosial',
            ]),

            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.peksos.recapitulation.list',
                'description' => 'Lihat Rekapitulasi Pekerja Sosial',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.peksos.recapitulation.create',
                'description' => 'Buat Rekapitulasi Pekerja Sosial',
            ]),
            new Permission([
                'type' => User::TYPE_ADMIN,
                'name' => 'admin.cluster_5.peksos.recapitulation.delete',
                'description' => 'Hapus Rekapitulasi Pekerja Sosial',
            ]),
        ]);

        // Assign Permissions to other Roles
        //

        $this->enableForeignKeys();
    }
}
