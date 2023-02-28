<template>
    <v-chart
        id="echarts"
        class="chart"
        theme="dp3ap2"
        autoresize
        :loadingOptions="{
            text: 'Data sedang diunduh...',
            color: '#c0392b',
            maskColor: 'rgba(255, 255, 255, 0.4)',
        }"
    />
</template>

<script>
import { ref, defineComponent } from "vue";

export default defineComponent({
    setup() {
        const option = ref({
            tooltip: {
                trigger: "item",
                axisPointer: {
                    type: "shadow",
                },
            },
            legend: {
                type: "scroll",
                data: [],
            },
            grid: {
                left: "0%",
                right: "0%",
                bottom: "0%",
                containLabel: true,
            },
            xAxis: [
                {
                    type: "category",
                    axisLabel: {
                        rotate: -90,
                        fontSize: 10,
                        overflow: "break",
                        width: 70,
                        interval: 0,
                        align: "left",
                        verticalAlign: "middle",
                    },
                    data: [],
                    position: "bottom",
                },
                {
                    type: "category",
                    position: "top",
                    axisLabel: {
                        interval: 0,
                    },
                    axisTick: {
                        alignWithLabel: false,
                        length: 50,
                        align: "left",
                        interval: function (index, value) {
                            return value ? true : false;
                        },
                    },
                    splitLine: {
                        show: true,
                        interval: function (index, value) {
                            return value ? true : false;
                        },
                    },
                    data: [],
                },
            ],
            yAxis: [
                {
                    type: "value",
                },
            ],
            series: [],
        });

        return { option };
    },
    // watch: {
    //     data(newData) {
    //         if (newData.legend.length > 0) {
    //             this.option.legend.data = toRaw(newData.legend);
    //         }

    //         if (newData.location_axis.length > 0) {
    //             this.option.xAxis[0].data = toRaw(newData.location_axis);
    //         }

    //         if (newData.year_axis.length > 0) {
    //             this.option.xAxis[1].data = toRaw(newData.year_axis);
    //         }

    //         if (newData.data.length > 0) {
    //             this.option.series = toRaw(newData.data);
    //         }
    //     },
    // },
});
</script>

<style scoped>
.chart {
    height: 550px;
}
</style>
