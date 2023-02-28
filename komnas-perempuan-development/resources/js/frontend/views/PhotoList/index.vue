<template>
    <d-head title="Foto" />
    <a-row :gutter="[8, 24]">
        <a-col :span="24">
            <a-typography-title :level="4" class="page-title"
                >Data Foto</a-typography-title
            >
        </a-col>

        <a-col :span="24">
            <a-row :gutter="[8, 16]">
                <template
                    v-for="item in $page.props.images.data"
                    :key="item.id"
                >
                    <a-col :span="4" class="image">
                        <photo :src="item.path" />
                    </a-col>
                </template>
            </a-row>

            <a-row class="pagination-container">
                <a-col :span="24" class="pagination">
                    <pagination
                        :links="$page.props.images.links"
                        :current="$page.props.images.current_page"
                        :total="$page.props.images.total"
                        :page-size="$page.props.images.per_page"
                    />
                </a-col>
            </a-row>
        </a-col>
    </a-row>
</template>

<style scoped>
.image :deep(.ant-img) {
    max-height: 225px;
    overflow: hidden;
}
.image :deep(.ant-image-img) {
    height: 225px;
    max-height: 225px;
}

.pagination-container {
    margin-top: 24px;
}
.pagination div {
    float: right;
}
</style>
<script>
import Photo from "@fe/components/Photo";
import Pagination from "@fe/components/Pagination";

import { defineComponent } from "vue";

export default defineComponent({
    components: {
        photo: Photo,
        pagination: Pagination,
    },
});
</script>
