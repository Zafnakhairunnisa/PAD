<template>
  <a-layout-header class="layout-header-container">
    <a-row align="middle" justify="space-between">
      <a-col>
        <Link href="/">
          <div class="logo">
            <img class="logo-image" :src="images.LOGO" alt="Logo" />
            <div class="logo-title">
              <span>DP3AP2 DIY</span>
              <span
                >DINAS PEMBERDAYAAN PEREMPUAN PERLINDUNGAN ANAK DAN PENGENDALIAN
                PENDUDUK YOGYAKARTA</span
              >
            </div>
          </div>
        </Link>
      </a-col>
      <a-col :span="19">
        <div class="navigation-container">
          <a-menu
            v-if="width >= 769"
            v-model:selectedKeys="selectedKeys"
            theme="light"
            mode="horizontal"
            @click="handleClickMenu"
            class="navigation-menu"
            :inlineCollapsed="false"
          >
            <template v-for="item in menus" :key="item.label">
              <template v-if="!item.children">
                <a-menu-item :key="item.label">
                  <Link :href="route(item.path)">
                    {{ item.label }}
                  </Link>
                </a-menu-item>
              </template>

              <template v-else>
                <a-sub-menu :key="item.path">
                  <template #title>{{ item.label }}</template>
                  <template v-for="child in item.children" :key="child.label">
                    <a-menu-item>
                      <Link :href="route(child.path)">
                        {{ child.label }}
                      </Link>
                    </a-menu-item>
                  </template>
                </a-sub-menu>
              </template>
            </template>
          </a-menu>

          <a v-if="!$page.props.user" :href="route('frontend.auth.login')">
            <a-button type="primary">Masuk</a-button>
          </a>

          <a v-if="$page.props.user" :href="route('admin.dashboard')">
            <a-button type="primary">Dashboard</a-button>
          </a>
        </div>
      </a-col>
    </a-row>
  </a-layout-header>
</template>

<script>
import { useNavigationStore } from "@fe/stores/navigation";
import { useTabStore } from "@fe/stores/tab";
import { defineComponent, toRaw } from "vue";
import { storeToRefs } from "pinia";
import { images } from "@fe/utils";

export default defineComponent({
  setup() {
    const store = useNavigationStore();
    const tab = useTabStore();

    const { width, selectedKeys, menus } = storeToRefs(store);

    const handleClickMenu = ({ keyPath }) => {
      store.setSelectedKeys(keyPath);
      tab.resetKey();
    };

    const handleOpenDrawer = () => {
      store.showDrawer();
    };

    return {
      showDrawer: handleOpenDrawer,
      handleClickMenu,

      width,
      selectedKeys,
      menus,

      images,
    };
  },
});
</script>

<style scoped>
.logo {
  float: left;
  height: 50px;
  display: flex;
}
.logo-title {
  margin-left: 10px;
  display: flex;
  flex-direction: column;
  color: #000;
  max-width: 200px;
  line-height: normal;
}
.logo-title span:first-child {
  font-size: 16px;
  font-weight: 600;
}

.logo-title span:last-child {
  font-size: 8px;
}

.navigation-container {
  display: flex;
  align-items: center;
  width: 100%;
}
.layout-header-container {
  background: #fff;
  display: flex;
  justify-content: space-between;

  border-bottom: 1px solid rgb(216 216 216 / 44%);
  padding: 0 60px !important;

  position: fixed;
  z-index: 999;
  width: 100%;
}

.layout-header-container :deep(.ant-row) {
  width: 100%;
}

.navigation-menu {
  border-bottom: none;
}
@media screen and (min-width: 769px) {
  .layout-header-container {
    border-bottom: none;
  }
  .navigation-menu {
    flex: auto;
    /* padding-left: 250px; */
  }
}
</style>

<style>
.navigation-drawer .ant-menu-vertical {
  border-right: none;
}
.navigation-menu,
.ant-menu-submenu-popup {
  text-transform: capitalize;
}
</style>
