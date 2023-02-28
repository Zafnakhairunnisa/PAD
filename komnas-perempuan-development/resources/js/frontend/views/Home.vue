<template>
  <d-head title="Profil Anak" />
  <a-row align="middle" justify="center" :gutter="[8, 16]">
    <a-col :span="24" class="welcome-container">
      <a-typography-title :level="3" class="welcome-info"
        >Sistem Informasi Data Anak Jogja Istimewa</a-typography-title
      >
      <a-typography-title :level="1" class="welcome-title"
        >SI-AJI</a-typography-title
      >
    </a-col>
    <a-col :span="24" :md="{ span: 20 }" :xxl="{ span: 14 }">
      <a-input-search
        :bordered="false"
        placeholder="Mau cari info tentang apa?"
        class="search-input"
      >
        <template #enterButton>
          <a-button type="primary">
            <template #icon
              ><SearchOutlined :style="{ fontSize: 43 }"
            /></template>
          </a-button>
        </template>
      </a-input-search>
    </a-col>

    <a-col :span="24" class="cluster">
      <a-row :gutter="[16, 16]">
        <a-col :span="24" :lg="{ span: 8 }">
          <Link :href="route(menus[1].children[0].path)">
            <IconCard icon="kelembagaan.svg" title="Kelembagaan" />
          </Link>
        </a-col>
        <a-col :span="24" :lg="{ span: 8 }">
          <Link :href="route(menus[2].children[0].path)">
            <IconCard
              icon="cluster1.svg"
              title="Klaster I. Hak Sipil dan Kebebasan"
            />
          </Link>
        </a-col>
        <a-col :span="24" :lg="{ span: 8 }">
          <Link :href="route(menus[3].children[0].path)">
            <IconCard
              icon="cluster2.svg"
              title="Klaster II. Lingkungan Keluarga dan Pengasuhan Alternatif"
            />
          </Link>
        </a-col>

        <a-col :span="24" :lg="{ span: 8 }">
          <Link :href="route(menus[4].children[0].path)">
            <IconCard
              icon="cluster3.svg"
              title="Klaster III. Kesehatan Dasar dan Kesejahteraaan"
            />
          </Link>
        </a-col>
        <a-col :span="24" :lg="{ span: 8 }">
          <Link :href="route(menus[5].children[0].path)">
            <IconCard
              icon="cluster4.svg"
              title="Klaster IV. Pendidikan, Pemanfaatan Waktu Luang, dan Kegiatan Budaya"
            />
          </Link>
        </a-col>
        <a-col :span="24" :lg="{ span: 8 }">
          <Link :href="route(menus[6].children[0].path)">
            <IconCard
              icon="cluster5.svg"
              title="Klaster V. Perlindungan Khusus Anak"
            />
          </Link>
        </a-col>
      </a-row>
    </a-col>
  </a-row>
</template>

<script>
import IconCard from "@fe/components/IconCard";
import { Head } from "@inertiajs/inertia-vue3";
import { useNavigationStore } from "@fe/stores/navigation";
import { storeToRefs } from "pinia";

import { defineComponent } from "vue";
export default defineComponent({
  setup() {
    const store = useNavigationStore();
    const { menus } = storeToRefs(store);

    return {
      menus,
    };
  },
  methods: {
    handlePrevCarousel() {
      this.$refs.carouselRef.prev();
    },
    handleNextCarousel() {
      this.$refs.carouselRef.next();
    },
  },
  components: {
    IconCard,
    Head,
  },
});
</script>

<style scoped>
.welcome-container {
  margin-top: 80px;
  text-align: center;
}
.welcome-info {
  font-weight: 500;
}
.welcome-title {
  margin-top: 0 !important;
  font-weight: 700 !important;
  text-transform: uppercase;
  font-size: 24px;
}

.search-input :deep(input) {
  border-radius: 100px !important;
  height: 40px;
  padding-left: 24px;
}

.search-input :deep(input),
.search-input :deep(input:hover),
.search-input :deep(input:focus) {
  background-color: #f5f5f5;
}

.search-input :deep(button) {
  border-radius: 50% !important;
  height: 34px !important;
  width: 34px !important;
}

.search-input :deep(.ant-input-group-addon) {
  background-color: transparent;
  border-radius: 50%;
  z-index: 99;
  position: absolute;
  left: calc(100% - 43px) !important;
  top: 3px;
}

.cluster {
  margin-top: 25px;
}
@media screen and (min-width: 769px) {
  .ant-carousel :deep(.slick-slide div.ant-card) {
    margin: 10px;
  }

  .welcome-title {
    font-size: 72px !important;
  }
  .search-input :deep(input) {
    height: 59px;
  }
  .search-input :deep(button) {
    height: 43px !important;
    width: 43px !important;
  }

  .search-input :deep(.ant-input-group-addon) {
    left: calc(100% - 53px) !important;
    top: 8px;
  }
  .cluster {
    margin-top: 130px;
  }
}
</style>
