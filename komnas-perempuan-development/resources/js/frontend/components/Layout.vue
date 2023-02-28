<template>
    <a-layout>
        <navigation />
        <a-layout-content class="main-content">
            <!-- <router-view></router-view> -->
            <slot></slot>
        </a-layout-content>
        <a-layout-footer>
            ©{{ currentYear }} DP2AP2
        </a-layout-footer>

        <a-drawer
            placement="left"
            class="navigation-drawer"
            :visible="drawerVisible"
            destroyOnClose
            v-if="windowWidth < 769"
            @close="onClose"
        >
            <template #closeIcon></template>
            <template #extra>
                <a-button type="primary" @click="onClose">
                    <template #icon>
                        <CloseOutlined />
                    </template>
                </a-button>
            </template>
            <a-menu
                theme="light"
                v-model:selectedKeys="selectedKeys"
                @click="onChangeKey"
                class="navigation-menu"
            >
                <a-menu-item v-for="menu in menus" :key="menu.label">
                    {{ menu.label }}
                </a-menu-item>
            </a-menu>
        </a-drawer>
    </a-layout>
</template>

<script>
import { useNavigationStore } from "../stores/navigation";
import { CloseOutlined } from "@ant-design/icons-vue";
import Navigation from "./Navigation";

import { defineComponent, onBeforeUnmount, onMounted } from "vue";
import { computed } from "@vue/reactivity";
import { storeToRefs } from "pinia";

export default defineComponent({
    setup() {
        const store = useNavigationStore();

        const { width, selectedKeys, menus } = storeToRefs(store);

        const onChangeKey = ({ keyPath }) => {
            store.setSelectedKeys(keyPath);
        };

        const onResize = () => {
            store.setWindowWidth(window.innerWidth);
        };

        onMounted(() => {
            window.addEventListener("resize", onResize);
        });

        onBeforeUnmount(() => {
            window.removeEventListener("resize", this.onResize);
        });

        return {
            onClose: computed(() => store.handleCloseDrawer),
            onChangeKey,
            selectedKeys,
            currentYear: new Date().getFullYear(),
            windowWidth: width,
            drawerVisible: computed(() => store.drawerVisible),
            menus,
        };
    },
    components: { CloseOutlined, navigation: Navigation },
});
</script>

<style scoped>
.main-content {
    background-color: #fff;
    padding: 16px 24px;
    margin-top: 65px;
}
</style>

<style>
.chart {
    height: 550px;
}
</style>
