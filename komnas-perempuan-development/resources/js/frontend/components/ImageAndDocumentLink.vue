<template>
  <template v-if="dataIndex === 'category'">{{ value.name }}</template>
  <template v-else-if="dataIndex === 'media_type'">{{ value.name }}</template>
  <template v-else-if="dataIndex === 'location'">{{ value.name }}</template>
  <template v-else-if="dataIndex === 'documents_count'">
    <template v-if="value != 0">
      <Link v-if="url && slug" :href="route(url + '.document', slug)">
        Lihat Dokumen
      </Link>
    </template>
    <template v-else> - </template>
  </template>

  <template v-else-if="dataIndex === 'images_count'">
    <template v-if="value != 0">
      <Link v-if="url && slug" :href="route(url + '.image', slug)">
        Lihat Foto
      </Link>
    </template>
    <template v-else> - </template>
  </template>

  <template v-else-if="dataIndex === 'jenis'">
    <span :style="{ textTransform: 'capitalize' }">
      {{ value ? value?.replace("_", " ") : "" }}</span
    >
  </template>

  <template v-else-if="dataIndex === 'sertifikasi'">
    <span :style="{ textTransform: 'capitalize' }">
      {{ value === "yes" ? "Ya" : "Belum" }}</span
    >
  </template>

  <template v-else>
    <template v-if="typeof value == 'string'">
      <template v-if="value.includes('ada') || value.includes('sesuai')">
        <span :style="{ textTransform: 'capitalize' }">
          {{ value.replace("_", " ") }}
        </span>
      </template>
      <template v-else>
        {{ value }}
      </template>
    </template>
    <template v-else>
      {{ value }}
    </template>
  </template>
</template>

<script>
import { defineComponent } from "vue";

export default defineComponent({
  props: {
    dataIndex: null,
    value: null,
    slug: String,
    url: String,
  },
  setup(props) {
    return {
      dataIndex: props.dataIndex,
      value: props.value,
      slug: props.slug,
      url: props.url,
    };
  },
});
</script>
