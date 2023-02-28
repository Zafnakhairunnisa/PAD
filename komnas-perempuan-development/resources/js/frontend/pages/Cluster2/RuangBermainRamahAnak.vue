<template>
  <d-head :title="title" />
  <a-row :gutter="[8, 24]">
    <a-col :span="24">
      <d-hero :title="heroTitle" :desc="heroDesc" image="cluster2.svg" />
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
            :columns="makeColumn($page.props.list_data.columns)"
            :data-source="$page.props.list_data.data.data"
            @change="handleTableChange"
            :pagination="{
              total: $page.props.list_data.data.total,
              pageSize: $page.props.list_data.data.per_page,
              showTotal: (total) => `Total ${total} item`,
              current: $page.props.list_data.data.current_page,
            }"
          >
            <template #bodyCell="{ column, text, record }">
              <d-image-and-document-link
                :data-index="column.dataIndex"
                :value="text"
                :slug="record.slug"
                url="frontend.institutional.ruang_bermain_ramah_anak"
              />
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
      title: "Ruang Bermain Ramah Anak",
      heroTitle: "Klaster II",
      heroDesc:
        "Klaster II memuat informasi mengenai data kesejahteraan sosial anak yang meliputi Perkawinan Anak, Lembaga Konsultasi keluarga, Lembaga Pendidikan Anak Usia Dini Holistik Integratif (PAUD HI), Ruang Bermain Ramah Anak, dan Lembaga Kesejahteraan Sosial Anak. Klaster ini berfokus pada data organisasi sosial atau perkumpulan sosial yang melaksanakan penyelenggaraan esejahteraan sosial anak yang berfokus pada pengembangan fisik, mental, dan sosial anak-anak.",
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
