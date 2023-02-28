<template>
  <d-head :title="title" />
  <a-row :gutter="[8, 24]">
    <a-col :span="24">
      <d-hero :title="heroTitle" :desc="heroDesc" />
    </a-col>

    <a-col :span="24">
      <d-page-title
        :title="title"
        @download-data="handleDownloadData"
        :enableDownloadImage="false"
      />
    </a-col>

    <a-col :span="24">
      <d-table>
        <template #recapitulation>
          <a-table
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
      title: "Indeks Perlindungan Anak",
      heroTitle: "Kelembagaan",
      heroDesc:
        "Kelembagaan adalah proses peraturan yang berkelanjutan yang menentukan struktur organisasi, tata kelola, dan budaya dalam organisasi. Kelembagaan memastikan integritas dan transparansi dalam praktik organisasi, serta menjamin bahwa keputusan yang diambil bertanggung jawab dan memenuhi standar moral dan etika. Dalam halaman Kelembagaan ini memuat Indeks Perlindungan Anak, Peraturan dan Kebijakan, Kegiatan Perlindungan Anak, Satgas PPA, Forum Anak, Organisasi Peduli Anak, Media Massa Sahabat Anak, Kelurahan Layak Anak, dan Kapanewon Layak Anak.",
    };
  },
  methods: {
    handleDownloadData(event) {
      this.downloadExcel("Indeks Perlindungan Anak", event);
    },
  },
});
</script>
