<template>
  <d-head :title="title" />
  <a-row :gutter="[8, 24]">
    <a-col :span="24">
      <d-hero :title="heroTitle" :desc="heroDesc" image="cluster3.svg" />
    </a-col>

    <a-col :span="24">
      <d-page-title
        :title="title"
        @download-data="handleDownloadData"
        @download-image="handleDownloadImage"
      />
    </a-col>

    <a-col :span="24">
      <d-table>
        <template #recapitulation>
          <a-table
            :row-class-name="
              (_record, index) => (index % 2 === 1 ? 'table-striped' : null)
            "
            :row-key="(record) => record.id"
            :bordered="true"
            :scroll="{ x: 'max-content' }"
            :columns="$page.props.recapitulation.columns"
            :data-source="$page.props.recapitulation.data"
            :pagination="false"
          />
        </template>
        <template #chart>
          <d-chart :option="$page.props.chart_data" />
        </template>
      </d-table>
    </a-col>
  </a-row>
</template>

<script>
import Layout from "@fe/components/Layout";

import { defineComponent } from "vue";

export default defineComponent({
  layout: Layout,
  setup() {
    return {
      title: "Imunisasi",
      heroTitle: "Klaster III",
      heroDesc:
        "Klaster III memuat informasi mengenai data ibu dan anak yang meliputi Persalinan di Fasilitas Kesehatan, Kepemilikan Kartu Ibu dan Anak, Cakupan Imuniasasi Dasar lengkap, Angka Kematian Ibu Melahirkan (AKI), Prevalensi Gizi Anak, Pemberian ASI, Fasilitas Kesehatan Ramah Anak, Air Bersih dan Sanitasi, serta Angka Kematian Anak. Kesehatan ibu dan bayi menjadi prioritas utama selama proses persalinan. Bayi membutuhkan pengawasan dan perawatan yang cukup untuk memastikan pertumbuhannya yang sehat.",
    };
  },
  methods: {
    handleDownloadData(event) {
      this.downloadExcel(this.title, event);
    },
    handleDownloadImage() {
      this.downloadChart("Rekapitulasi " + this.title);
    },
  },
});
</script>
