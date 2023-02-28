<template>
    <a-card hoverable class="card-icon" :bordered="false">
        <a-row align="middle" :gutter="[16, 16]">
            <a-col :span="9">
                <div class="card-icon-image">
                    <img :alt="icon" :src="getImageUrl(icon)" />
                </div>
            </a-col>
            <a-col :span="15" class="card-icon-text">
                <a-typography-title :level="4">{{ title }}</a-typography-title>
            </a-col>
        </a-row>
    </a-card>
</template>

<script>
import { defineComponent } from "vue";
import { getImageUrl } from "@fe/utils";

export default defineComponent({
    props: {
        icon: String,
        title: String,
    },
    methods: {
        getImageUrl,
    },
});
</script>

<style scoped>
.card-icon-image {
    background-color: #fafafa;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.card-icon-image img {
    height: 90px;
}
.card-icon :deep(.ant-card-body) {
    padding: 10px;
}
.card-icon :deep(.card-icon-text .ant-typography) {
    font-weight: 500;
}

@media screen and (min-width: 769px) {
    .card-icon-image img {
        height: 130px;
        width: 168px;
    }
    .card-icon :deep(.ant-card-body) {
        padding: 16px;
    }
}
</style>
