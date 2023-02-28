<template>
    <document-list />
</template>

<script>
import Layout from "@fe/components/Layout";

import DocumentList from "@fe/views/DocumentList";
import { defineComponent } from "vue";

export default defineComponent({
    layout: Layout,
    components: {
        "document-list": DocumentList,
    },
});
</script>
