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
        @download-image="handleDownloadImage"
      />
    </a-col>

    <a-col :span="24">
      <d-table>
        <template #data>
          <a-table
            :row-class-name="
              (_record, index) => (index % 2 === 1 ? 'table-striped' : null)
            "
            :row-key="(record) => record.id"
            :bordered="true"
            :scroll="{ x: 'max-content' }"
            :columns="makeColumn(columns)"
            :data-source="$page.props.data.data"
            @change="handleTableChange"
            :pagination="{
              total: $page.props.data.total,
              pageSize: $page.props.data.per_page,
              showTotal: (total) => `Total ${total} item`,
              current: $page.props.data.current_page,
            }"
          >
            <template #bodyCell="{ column, text }">
              <template v-if="column.dataIndex === 'location'">{{
                text.name
              }}</template>
              <template v-if="column.dataIndex === 'source_of_fund'">{{
                text.name
              }}</template>
              <template v-if="column.dataIndex === 'activity_type'">{{
                text.name
              }}</template>
              <template v-if="column.dataIndex === 'budget'"
                >Rp. {{ text }}</template
              >
            </template>
          </a-table>
        </template>
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
          >
            <template #bodyCell="{ column, text }">
              <template v-if="column.dataIndex === 'location'">{{
                text.name
              }}</template>
            </template>
          </a-table>
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

const columns = [
  {
    title: "Nama Lembaga",
    dataIndex: "company_name",
    sorter: true,
  },
  {
    title: "Sumber Dana",
    dataIndex: "source_of_fund",
    sorter: true,
  },
  {
    title: "Nama Kegiatan",
    dataIndex: "activity_name",
    sorter: true,
  },
  {
    title: "Jenis Kegiatan",
    dataIndex: "activity_type",
    sorter: true,
  },
  {
    title: "Sasaran",
    dataIndex: "target",
    sorter: true,
  },
  {
    title: "Anggaran",
    dataIndex: "budget",
    sorter: true,
  },
  {
    title: "Tahun",
    dataIndex: "year",
    sorter: true,
  },
  {
    title: "Dokumen",
    dataIndex: "documents_count",
    scopedSlots: {
      customRender: "document-link",
    },
    customRender: function ({ value, record }) {
      if (value > 0) {
        return (
          <Link
            href={route(
              "frontend.institutional.child_protection_activity.document",
              record.slug
            )}
          >
            Lihat Dokumen
          </Link>
        );
      }
      return null;
    },
  },
  {
    title: "Foto",
    dataIndex: "images_count",
    scopedSlots: {
      customRender: "image-link",
    },
    customRender: function ({ value, record }) {
      if (value > 0) {
        return (
          <Link
            href={route(
              "frontend.institutional.child_protection_activity.image",
              record.slug
            )}
          >
            Lihat Foto
          </Link>
        );
      }
      return null;
    },
  },
  {
    title: "Wilayah",
    dataIndex: "location",
    sorter: true,
  },
];
export default defineComponent({
  layout: Layout,
  setup() {
    return {
      columns,
      title: "Kegiatan Perlindungan Anak",
      heroTitle: "Kelembagaan",
      heroDesc:
        "Kelembagaan adalah proses peraturan yang berkelanjutan yang menentukan struktur organisasi, tata kelola, dan budaya dalam organisasi. Kelembagaan memastikan integritas dan transparansi dalam praktik organisasi, serta menjamin bahwa keputusan yang diambil bertanggung jawab dan memenuhi standar moral dan etika. Dalam halaman Kelembagaan ini memuat Indeks Perlindungan Anak, Peraturan dan Kebijakan, Kegiatan Perlindungan Anak, Satgas PPA, Forum Anak, Organisasi Peduli Anak, Media Massa Sahabat Anak, Kelurahan Layak Anak, dan Kapanewon Layak Anak.",
    };
  },
  methods: {
    handleDownloadData(event) {
      this.downloadExcel("Kegiatan Perlindungan Anak", event);
    },
    handleDownloadImage() {
      this.downloadChart("Kegiatan Perlindungan Anak");
    },
  },
});
</script>
