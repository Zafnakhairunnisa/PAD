<template>
    <a-row align="middle" justify="space-between" :gutter="16">
        <a-col>
            <a-typography-title :level="4" class="page-title">{{
                title
            }}</a-typography-title>
        </a-col>
        <a-col>
            <template v-if="enableDownloadImage">
                <a-dropdown-button @click="download" type="primary">
                    Unduh Data
                    <template #overlay>
                        <a-menu>
                            <a-menu-item
                                @click="downloadImage"
                                key="download_grafik"
                                >Unduh Grafik</a-menu-item
                            >
                        </a-menu>
                    </template>
                </a-dropdown-button>
            </template>
            <template v-else>
                <a-button @click="download" type="primary">
                    Unduh Data
                </a-button>
            </template>
        </a-col>
    </a-row>
</template>

<script>
import { defineComponent } from "vue";
import { useTabStore } from "../stores/tab";

export default defineComponent({
    props: {
        title: String,
        enableDownloadImage: {
            type: Boolean,
            default: true,
        },
    },
    setup(props, { emit }) {
        const tabStore = useTabStore();
        const download = () => {
            emit("download-data", tabStore.getActiveKey);
        };
        const downloadImage = () => {
            emit("download-image");
        };

        return {
            download,
            downloadImage,
            title: props.title,
            enableDownloadImage: props.enableDownloadImage,
        };
    },
});
</script>
