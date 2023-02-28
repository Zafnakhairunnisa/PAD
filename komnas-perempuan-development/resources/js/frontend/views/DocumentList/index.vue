<template>
    <d-head title="Dokumen" />
    <a-row :gutter="[8, 24]">
        <a-col :span="24">
            <a-typography-title :level="4" class="page-title"
                >Data Dokumen</a-typography-title
            >
        </a-col>

        <a-col :span="24">
            <document-list
                :data-source="$page.props.documents.data"
                @change="handleTableChange"
            />
        </a-col>
    </a-row>
</template>

<script>
import Document from "@fe/components/Document";
import { Inertia } from "@inertiajs/inertia";

import { defineComponent } from "vue";
import { Head } from "@inertiajs/inertia-vue3";

export default defineComponent({
    setup() {
        const handleTableChange = (p, _filter, sorter) => {
            const url = new URL(location.href);
            url.searchParams.delete("page");
            url.searchParams.delete("sort");

            let params = {
                page: p.current,
                sort: "",
            };
            if (sorter.order) {
                params["sort"] = `${sorter.field}:${sorter.order}`;
            }
            const searchParams = new URLSearchParams(params);
            Inertia.visit(`${url}?${searchParams.toString()}`, {
                preserveState: true,
            });
        };
        return {
            handleTableChange,
        };
    },
    components: {
        "document-list": Document,
        Head,
    },
});
</script>
