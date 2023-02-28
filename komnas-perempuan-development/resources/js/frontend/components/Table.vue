<template>
  <a-tabs v-model:activeKey="activeKey" @tabClick="handleChangeTab">
    <a-tab-pane
      key="recapitulation"
      tab="Rekapitulasi Data"
      v-if="hasRecapitulation || hasChart"
    >
      <a-row :gutter="[8, 16]">
        <a-col :span="24" v-if="hasRecapitulation">
          <slot name="recapitulation"></slot>
        </a-col>
        <a-col :span="24" v-if="hasChart">
          <a-space :size="48" direction="vertical" style="width: 100%">
            <a-card :bordered="false" title="Diagram Batang" class="card-chart">
              <template #extra>
                <year-picker picker="year" />
              </template>
              <slot name="chart"></slot>
            </a-card>
            <!-- <a-row class="chart-footer">
              <a-col :span="12">
                <a-typography-title :level="5">Sumber Data</a-typography-title>
                <a-typography-paragraph>
                  1.
                  <a-typography-text underline
                    >dukcapil.jogjaprov.go.id</a-typography-text
                  >
                  <br />
                  2.
                  <a-typography-text underline
                    >sumberdata.jogja.com</a-typography-text
                  >
                </a-typography-paragraph>
              </a-col>
              <a-col :span="12">
                <a-typography-title :level="5">Dokumen</a-typography-title>
                <a-typography-paragraph>
                  1.
                  <a-typography-text underline
                    >Dokumen Rahasia.pdf</a-typography-text
                  >
                </a-typography-paragraph>
              </a-col>
            </a-row> -->
          </a-space>
        </a-col>
        <a-col :span="24" v-if="hasOptionalChart">
          <a-space :size="48" direction="vertical" style="width: 100%">
            <slot name="optionalChart"></slot>
          </a-space>
        </a-col>
      </a-row>
    </a-tab-pane>

    <a-tab-pane
      key="datalist"
      tab="Daftar Data"
      v-if="hasDataList || hasChartDataList"
      class="datalist"
    >
      <a-row :gutter="[8, 16]">
        <a-col :span="24" v-if="hasDataList">
          <slot name="data"></slot>
        </a-col>

        <a-col :span="24" v-if="hasChartDataList">
          <a-card :bordered="false" title="Diagram" class="card-chart">
            <slot name="chart-datalist"></slot>
          </a-card>
        </a-col>
      </a-row>
    </a-tab-pane>
  </a-tabs>
</template>

<script>
import YearPicker from "@fe/components/YearRangePicker";

import { defineComponent, ref } from "vue";
import { useTabStore } from "../stores/tab";

export default defineComponent({
  setup(_, { slots }) {
    const tabStore = useTabStore();
    const hasRecapitulation = ref(false);
    const hasChart = ref(false);
    const hasOptionalChart = ref(false);
    const hasDataList = ref(false);
    const hasChartDataList = ref(false);

    if (slots.recapitulation && slots.recapitulation().length) {
      hasRecapitulation.value = true;
    }
    if (slots.chart && slots.chart().length) {
      hasChart.value = true;
    }
    if (slots.optionalChart && slots.optionalChart().length) {
      hasOptionalChart.value = true;
    }
    if (slots.data && slots.data().length) {
      hasDataList.value = true;
    }
    if (slots["chart-datalist"] && slots["chart-datalist"]().length) {
      hasChartDataList.value = true;
    }

    return {
      tabStore,
      hasRecapitulation,
      hasChart,
      hasOptionalChart,
      hasDataList,
      hasChartDataList,
    };
  },
  components: {
    "year-picker": YearPicker,
  },
  computed: {
    activeKey() {
      return this.hasRecapitulation ? this.tabStore.getActiveKey : "datalist";
    },
  },
  methods: {
    handleChangeTab(tabKey) {
      this.tabStore.setActiveKey(tabKey);
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
