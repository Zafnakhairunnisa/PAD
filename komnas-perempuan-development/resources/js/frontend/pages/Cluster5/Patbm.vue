<template>
  <d-head :title="title" />
  <a-row :gutter="[8, 24]">
    <a-col :span="24">
      <d-hero :title="heroTitle" :desc="heroDesc" image="cluster5.svg" />
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
        <template #optionalChart>
          <a-card :bordered="false" title="Persentase PATBM dibanding Kelurahan (%)" class="card-chart">
            <template #extra>
              <year-picker picker="year" />
            </template>
            <d-chart :option="$page.props.optional_chart_data" />
          </a-card>
        </template>
      </d-table>
    </a-col>
  </a-row>
</template>

<script>
import Layout from "@fe/components/Layout";
import YearPicker from "@fe/components/YearRangePicker";

import { defineComponent } from "vue";

export default defineComponent({
  layout: Layout,
  setup() {
    return {
      title: "Perlindungan Terhadap Anak Berbasis Masyarakat (PATBM)",
      heroTitle: "Klaster V",
      heroDesc:
        "Klaster V memuat informasi mengenai perlindungan anak yang meliputi Pelindungan Terpadu Anak Berbasis Masyarakat, Kekerasan terhadap Anak, Anak Memerlukan Perlindungan Khusus, Anak Berhadapan dengan Hukum, Anak Korban Terorisme dan Radikalisme, AIDS, Pekerja Anak, BPRS, LPKA, Polisi, Jaksa, Pengadilan, Bapas, dan Peksos.",
    };
  },
  components: {
    "year-picker": YearPicker,
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

<style scoped>
.card-chart {
  background-color: #fafafa !important;
  border-radius: 0 !important;
}
.card-chart :deep(.ant-card-head) {
  border-bottom: unset;
}
.card-chart :deep(.ant-card-head-title) {
  font-weight: 600;
  font-size: 16pt;
}
.card-chart :deep(.ant-card-body),
.card-chart :deep(.ant-card-head) {
  padding: 12px 36px 48px;
}
.card-chart :deep(.ant-card-body) {
  padding-top: 0;
  padding-left: 48px;
  padding-right: 48px;
}
.chart-footer {
  padding: 0 24px 24px;
}
</style>