import { defineStore } from "pinia";

export const usePaginationStore = defineStore("pagination", {
    state: () => ({
        page: false,
        limit: false,
    }),
    getters: {
        current: (state) => state.page,
        pageSize: (state) => state.limit,
    },
    actions: {
        setPage(page) {
            this.page = page;
        },
        setLimit(limit) {
            this.limit = limit;
        },
    },
});
