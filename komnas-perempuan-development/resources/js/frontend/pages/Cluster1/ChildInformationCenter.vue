<template>
  <d-head :title="title" />
  <a-row :gutter="[8, 24]">
    <a-col :span="24">
      <d-hero :title="heroTitle" :desc="heroDesc" image="cluster1.svg" />
    </a-col>

    <a-col :span="24">
      <d-page-title
        :title="title"
        @download-data="handleDownloadData"
        @download-image="handleDownloadImage"
      />
    </a-col>

    <a-col :span="24">
      <d-table />
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
      title: "Pusat Informasi Sahabat Anak",
      heroTitle: "Klaster I",
      heroDesc:
        "Klaster I merupakan informasi yang dibuat untuk melihat apakah tujuan memenuhi kebutuhan anak-anak di berbagai daerah meliputi Kepemilikan Akta Kelahiran, Kartu Identitas Anak (KIA) dan Pusat Informasi Sahabat Anak. Hak pertama setelah kelahiran anak adalah identitas yang meliputi nama, orang tua (data keluarga) dan kewarganegaraan dalam bentuk akta kelahiran. Sedangkan KIA (Kartu Tanda Penduduk Anak) merupakan identitas yang dimiliki oleh setiap anak, agar mereka dapat menggunakan pelayanan publik secara mandiri.",
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
