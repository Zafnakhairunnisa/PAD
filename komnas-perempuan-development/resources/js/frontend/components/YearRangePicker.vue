<template>
    <a-config-provider :locale="locale">
        <a-range-picker
            picker="year"
            :value="hackValue || value"
            :disabled-date="disabledDate"
            :allow-clear="false"
            @change="onChange"
            @openChange="onOpenChange"
            @calendarChange="onCalendarChange"
        />
    </a-config-provider>
</template>

<script>
import { defineComponent, ref } from "vue";
import { paramsToObject } from '../utils'

import { Inertia } from '@inertiajs/inertia'
import dayjs from "dayjs";
import "dayjs/locale/id";
import locale from "ant-design-vue/lib/date-picker/locale/id_ID";

dayjs.locale("id");

export default defineComponent({
    setup() {
        const today = dayjs()
        const five_year_previous = dayjs().subtract(4, 'year')
        
        const dates = ref();
        const value = ref([five_year_previous, today]);
        const hackValue = ref([five_year_previous, today]);

        const disabledDate = (current) => {
            if (dayjs(current) > dayjs()) {
                return true
            }
            if (!dates.value || dates.value.length === 0) {
                return false;
            }

            const tooLate =
                dates.value[0] && current.diff(dates.value[0], "years") > 3;
            const tooEarly =
                dates.value[1] && dates.value[1].diff(current, "years") > 3;
            return tooEarly || tooLate;
        };

        const onOpenChange = (open) => {
            if (open) {
                dates.value = [];
                hackValue.value = [];
            } else {
                hackValue.value = undefined;
            }
        };

        const onChange = function (val) {
            value.value = val;

            const from = val[0].format('YYYY')
            const to = val[1].format('YYYY')
            
            const url = new URL(location.href);
            const params = new URLSearchParams(url.search);
            params.delete("from");
            params.delete("to");

            params.set("from", from);
            params.set("to", to);

            Inertia.get(`${url.origin}${url.pathname}`, paramsToObject(params), {
                preserveState: true,
                preserveScroll: true,
            });
        };

        const onCalendarChange = (val) => {
            dates.value = val;
        };

        return {
            dates,
            value,
            hackValue,
            disabledDate,
            onOpenChange,
            onChange,
            onCalendarChange,
            locale,
        };
    }
});
</script>
