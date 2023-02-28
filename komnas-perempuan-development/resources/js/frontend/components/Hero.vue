<template>
  <a-row align="middle" justify="space-between" :gutter="16">
    <a-col :sm="14" :md="16" :lg="18" :xl="20">
      <a-typography-title :level="1" class="hero-title">{{
        title
      }}</a-typography-title>
      <p class="hero-desc" v-html="desc"></p>
    </a-col>

    <a-col>
      <img
        :src="getImageUrl(image || 'kelembagaan.svg')"
        class="hero-image"
        :alt="'Ikon ' + title"
      />
    </a-col>
  </a-row>
</template>

<script>
import { defineComponent } from "vue";

import { getImageUrl } from "@fe/utils";

export default defineComponent({
  props: {
    title: String,
    desc: String,
    image: String,
  },
  setup() {
    return {
      getImageUrl,
    };
  },
});
</script>

<style scoped>
.hero-desc {
  text-align: justify !important;
}
</style>