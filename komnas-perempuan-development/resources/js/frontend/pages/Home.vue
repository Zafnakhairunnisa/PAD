<template>
    <Home />
</template>

<script>
import Layout from "@fe/components/Layout";

import Home from "@fe/views/Home";
import { defineComponent } from "vue";

export default defineComponent({
    layout: Layout,
    components: {
        Home,
    },
});
</script>
