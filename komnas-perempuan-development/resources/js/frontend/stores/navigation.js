import { defineStore } from "pinia";

export const useNavigationStore = defineStore("navigation", {
    state: () => ({
        visible: false,
        windowWidth: window.innerWidth,
        selectedKeys: ["beranda"],
        menus: [
            {
                label: "Beranda",
                path: "frontend.index",
            },
            {
                label: "Kelembagaan",
                path: "kelembagaan",
                children: [
                    {
                        label: "Indeks Perlindungan Anak",
                        path: "frontend.institutional.child_protection_index.index",
                    },
                    {
                        label: "Peraturan dan Kebijakan",
                        path: "frontend.institutional.regulation.index",
                    },
                    {
                        label: "Kegiatan Perlindungan Anak",
                        path: "frontend.institutional.child_protection_activity.index",
                    },
                    {
                        label: "Satgas PPA",
                        path: "frontend.institutional.satgas_ppa.index",
                    },
                    {
                        label: "Forum Anak",
                        path: "frontend.institutional.child_forum.index",
                    },
                    {
                        label: "Organisasi Peduli Anak",
                        path: "frontend.institutional.child_care_organization.index",
                    },
                    {
                        label: "Media Massa Sahabat Anak",
                        path: "frontend.institutional.child_media.index",
                    },
                    {
                        label: "Kelurahan Layak Anak",
                        path: "frontend.institutional.kelurahan_layak_anak.index",
                    },
                    {
                        label: "Kapanewon Layak Anak",
                        path: "frontend.institutional.kapanewon_layak_anak.index",
                    },
                ],
            },
            {
                label: "Klaster I",
                path: "cluster_1",
                children: [
                    {
                        label: "Akta Kelahiran",
                        path: "frontend.cluster_1.birth_certificate.index",
                    },
                    {
                        label: "Kartu Identitas Anak",
                        path: "frontend.cluster_1.child_identity_card.index",
                    },
                    {
                        label: "Pusat Informasi Sahabat Anak",
                        path: "frontend.cluster_1.child_information_center.index",
                    },
                ],
            },
            {
                label: "Klaster II",
                path: "cluster_2",
                children: [
                    {
                        label: "Perkawinan Anak",
                        path: "frontend.cluster_2.perkawinan_anak.index",
                    },
                    {
                        label: "Lembaga Konsultasi Keluarga",
                        path: "frontend.cluster_2.lembaga_konsultasi_keluarga.index",
                    },
                    {
                        label: "PAUD HI",
                        path: "frontend.cluster_2.paud_hi.index",
                    },
                    {
                        label: "Ruang Bermain Ramah Anak",
                        path: "frontend.cluster_2.ruang_bermain_ramah_anak.index",
                    },
                    {
                        label: "Lembaga Kesejahteraan Sosial Anak",
                        path: "frontend.cluster_2.lembaga_kesejahteraan_sosial_anak.index",
                    },
                ],
            },
            {
                label: "Klaster III",
                path: "cluster_3",
                children: [
                    {
                        label: "Persalinan",
                        path: "frontend.cluster_3.persalinan.index",
                    },
                    {
                        label: "Kartu Ibu dan Anak",
                        path: "frontend.cluster_3.kartu_ibu_anak.index",
                    },
                    {
                        label: "Imunisasi",
                        path: "frontend.cluster_3.imunisasi.index",
                    },
                    {
                        label: "Angka Kematian Bayi",
                        path: "frontend.cluster_3.angka_kematian_bayi.index",
                    },
                    {
                        label: "Angka Kematian Ibu Melahirkan",
                        path: "frontend.cluster_3.angka_kematian_ibu_melahirkan.index",
                    },
                    {
                        label: "Status Gizi Anak",
                        path: "frontend.cluster_3.status_gizi_anak.index",
                    },
                    {
                        label: "Pemberian Air Susu Ibu",
                        path: "frontend.cluster_3.pemberian_air_susu_ibu.index",
                    },
                    {
                        label: "Fasilitas Kesehatan Ramah Anak",
                        path: "frontend.cluster_3.fasilitas_kesehatan_ramah_anak.index",
                    },
                    {
                        label: "Air Bersih dan Sanitasi",
                        path: "frontend.cluster_3.air_bersih_dan_sanitasi.index",
                    },
                ],
            },
            {
                label: "Klaster IV",
                path: "cluster_4",
                children: [
                    {
                        label: "Pendidikan",
                        path: "frontend.cluster_4.education.index",
                    },
                    {
                        label: "Sekolah/Madrasah Ramah Anak",
                        path: "frontend.index",
                    },
                    {
                        label: "Pusat Kreatifitas Anak",
                        path: "frontend.cluster_4.pusat_kreatifitas_anak.index",
                    },
                    {
                        label: "Rumah Ibadah Ramah Anak",
                        path: "frontend.cluster_4.rumah_ibadah_ramah_anak.index",
                    },
                ],
            },
            {
                label: "Klaster V",
                path: "cluster_5",
                children: [
                    {
                        label: "Perlindungan Anak Terpadu Berbasis Masyarakat (PATBM)",
                        path: "frontend.cluster_5.patbm.index",
                    },
                    {
                        label: "Angka Kekerasan Terhadap Anak",
                        path: "frontend.cluster_5.kekerasan_terhadap_anak.index",
                    },
                    {
                        label: "Anak Memerlukan Perlindungan Khusus (AMPK)",
                        path: "frontend.cluster_5.perlindungan_khusus_anak.index",
                    },
                    {
                        label: "Anak Berhadapan dengan Hukum (ABH)",
                        path: "frontend.cluster_5.anak_berhadapan_hukum.index",
                    },
                    {
                        label: "Anak Korban Terorisme dan Radikalisme",
                        path: "frontend.cluster_5.anak_korban_terorisme.index",
                    },
                    {
                        label: "Anak dengan HIV/AIDS (ADHA)",
                        path: "frontend.cluster_5.anak_aids.index",
                    },
                    {
                        label: "Pekerja Anak",
                        path: "frontend.cluster_5.pekerja_anak.index",
                    },
                    {
                        label: "Balai Perlindungan dan Rehabilitasi Sosial Remaja (BPRSR) DIY",
                        path: "frontend.cluster_5.bprs.index",
                    },
                    {
                        label: "Lembaga Pembinaan Khusus Anak Yogyakarta",
                        path: "frontend.cluster_5.lpka.index",
                    },
                    {
                        label: "Polisi Daerah DIY",
                        path: "frontend.cluster_5.polisi.index",
                    },
                    {
                        label: "Kejaksaan DIY",
                        path: "frontend.cluster_5.kejaksaan.index",
                    },
                    {
                        label: "Pengadilan DIY",
                        path: "frontend.cluster_5.pengadilan.index",
                    },
                    {
                        label: "Balai Pemasyarakatan DIY",
                        path: "frontend.cluster_5.bapas.index",
                    },
                    {
                        label: "Pekerja Sosial (Peksos)",
                        path: "frontend.cluster_5.peksos.index",
                    },
                ],
            },
            {
                label: "Tentang Kami",
                path: "frontend.index",
            },
        ],
    }),
    getters: {
        drawerVisible: (state) => state.visible,
        width: (state) => state.windowWidth,
        getSelectedKeys: (state) => state.selectedKeys,
    },
    actions: {
        handleCloseDrawer() {
            this.visible = false;
        },
        showDrawer() {
            this.visible = true;
        },
        setWindowWidth(width) {
            this.windowWidth = width;
        },
        setSelectedKeys(selectedKeys) {
            this.selectedKeys = selectedKeys;
        },
    },
    persist: false,
});
