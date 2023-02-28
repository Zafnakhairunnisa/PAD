<template>
    <photo-list />
</template>

<script>
import Layout from "@fe/components/Layout";

import PhotoList from "@fe/views/PhotoList";
import { defineComponent } from "vue";

export default defineComponent({
    layout: Layout,
    components: {
        "photo-list": PhotoList,
    },
});
</script>
