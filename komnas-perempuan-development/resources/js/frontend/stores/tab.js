import { defineStore } from "pinia";

export const useTabStore = defineStore("tab", {
    state: () => ({
        activeKey: "recapitulation",
    }),
    getters: {
        getActiveKey: (state) => state.activeKey,
    },
    actions: {
        setActiveKey(activeKey) {
            this.activeKey = activeKey;
        },
        resetKey() {
            this.activeKey = "recapitulation";
        },
    },
    persist: false,
});
