<template>
    <div v-if="links.length > 3">
        <a-pagination
            v-model:current="current"
            v-model:page-size="pageSize"
            :total="total"
            :show-total="(total) => `Total ${total} foto`"
            show-less-items
            @change="onChange"
        />
    </div>
</template>

<script>
import { Pagination } from "ant-design-vue";
import { Inertia } from "@inertiajs/inertia";

export default {
    props: {
        links: Array,
        current: Number,
        total: Number,
        pageSize: Number,
    },
    components: {
        "a-pagination": Pagination,
    },
    setup(props) {
        const onChange = (page) => {
            let url = new URL(location.href);
            url.searchParams.delete("page");
            Inertia.visit(`${url}?page=${page}`);
        };
        return {
            onChange,
        };
    },
};
</script>
