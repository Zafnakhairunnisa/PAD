/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("../bootstrap");
require("../plugins");

import { createPinia } from "pinia";
import piniaPluginPersistedstate from "pinia-plugin-persistedstate";

import { createApp, h } from "vue";
import { InertiaProgress } from "@inertiajs/progress";

import { ZiggyVue } from "ziggy";

import ECharts from "vue-echarts";
import { use, registerTheme } from "echarts/core";

import {
    Breadcrumb,
    BreadcrumbItem,
    Card,
    CardMeta,
    Carousel,
    Col,
    Drawer,
    Image,
    Input,
    InputSearch,
    LayoutContent,
    LayoutFooter,
    LayoutHeader,
    MenuItem,
    message,
    Row,
    Space,
    SubMenu,
    Table,
    Tabs,
    TabPane,
    TypographyText,
    TypographyTitle,
    DatePicker,
    RangePicker,
    Dropdown,
    DropdownButton,
    ConfigProvider,
    TableSummaryRow,
    TableSummaryCell,
    TableSummary,
    Form,
    FormItem,
    InputPassword,
} from "ant-design-vue";

import "ant-design-vue/dist/antd.less";
import { Button, Layout, Menu } from "ant-design-vue";
import {
    DownOutlined,
    LeftOutlined,
    RightOutlined,
    SearchOutlined,
} from "@ant-design/icons-vue";

import { VueQueryPlugin } from "@tanstack/vue-query";

import FeLayout from "@fe/components/Layout";
import ImageAndDocumentLinkVue from "@fe/components/ImageAndDocumentLink";
import DPTable from "@fe/components/Table";
import DPHero from "@fe/components/Hero";
import DPPageTitle from "@fe/components/PageTitle";
import DChart from "@fe/components/Chart";
import FeHome from "@fe/views/Home";

import { createInertiaApp, Link, Head } from "@inertiajs/inertia-vue3";

/**
 * Echart Plugin
 */
import { CanvasRenderer } from "echarts/renderers";
import { BarChart, PieChart, LineChart } from "echarts/charts";
import {
    GridComponent,
    TitleComponent,
    TooltipComponent,
    LegendComponent,
    ToolboxComponent,
} from "echarts/components";
import echartTheme from "./utils/chart.themes.json";
import formatSize from "./utils/formatSize";

import {
    handleTableChange,
    makeColumn,
    downloadExcel,
    downloadChart,
} from "./utils";

createInertiaApp({
    title: (title) => `DP3AP2 | ${title || ""}`,
    resolve: (name) => import(`./pages/${name}`),
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) });
        app.mixin({
            methods: {
                handleTableChange,
                makeColumn,
                downloadExcel,
                downloadChart,
            },
        });

        app.use(plugin);

        const pinia = createPinia();
        pinia.use(piniaPluginPersistedstate);

        /**
         * Pinia state management
         */
        app.use(pinia);

        /**
         * Ziggy management
         */
        app.use(ZiggyVue);

        const vueQueryPluginOptions = {
            queryClientConfig: {
                defaultOptions: {
                    queries: {
                        refetchOnWindowFocus: false,
                    },
                },
            },
        };

        app.use(VueQueryPlugin, vueQueryPluginOptions);

        registerTheme("dp3ap2", echartTheme);
        app.component("v-chart", ECharts, {
            loadingOptions: {
                text: "Data sedang diunduh...",
                color: "#c0392b",
                maskColor: "rgba(255, 255, 255, 0.4)",
            },
            autoresize: true,
        });
        use([
            CanvasRenderer,
            BarChart,
            PieChart,
            LineChart,
            GridComponent,
            TooltipComponent,
            TitleComponent,
            LegendComponent,
            ToolboxComponent,
        ]);

        app.component("a-button", Button);
        app.component("a-layout", Layout);
        app.component("a-layout-header", LayoutHeader);
        app.component("a-layout-content", LayoutContent);
        app.component("a-layout-footer", LayoutFooter);
        app.component("a-drawer", Drawer);
        app.component("a-menu", Menu);
        app.component("a-menu-item", MenuItem);
        app.component("a-sub-menu", SubMenu);
        app.component("a-breadcrumb", Breadcrumb);
        app.component("a-breadcrumb-item", BreadcrumbItem);
        app.component("a-space", Space);
        app.component("a-card", Card);
        app.component("a-card-meta", CardMeta);
        app.component("a-row", Row);
        app.component("a-col", Col);
        app.component("a-image", Image);
        app.component("a-typography-title", TypographyTitle);
        app.component("a-typography-text", TypographyText);
        app.component("a-input", Input);
        app.component("a-input-password", InputPassword);
        app.component("a-input-search", InputSearch);
        app.component("a-carousel", Carousel);
        app.component("a-table", Table);
        app.component("a-table-summary", TableSummary);
        app.component("a-table-summary-row", TableSummaryRow);
        app.component("a-table-summary-cell", TableSummaryCell);
        app.component("a-tabs", Tabs);
        app.component("a-tab-pane", TabPane);
        app.component("a-date-picker", DatePicker);
        app.component("a-range-picker", RangePicker);
        app.component("a-dropdown", Dropdown);
        app.component("a-dropdown-button", DropdownButton);
        app.component("a-config-provider", ConfigProvider);
        app.component("a-form", Form);
        app.component("a-form-item", FormItem);

        app.component("Link", Link);
        app.component("Head", Head);
        app.component("d-head", Head);
        app.component("d-image-and-document-link", ImageAndDocumentLinkVue);
        app.component("d-table", DPTable);
        app.component("d-hero", DPHero);
        app.component("d-page-title", DPPageTitle);
        app.component("d-chart", DChart);

        // Icons
        app.component("SearchOutlined", SearchOutlined);
        app.component("LeftOutlined", LeftOutlined);
        app.component("RightOutlined", RightOutlined);
        app.component("DownOutlined", DownOutlined);

        /**
         * Register component
         *
         */
        app.component("fe-layout", FeLayout);
        app.component("fe-home", FeHome);

        /**
         * Next, we will create a fresh Vue application instance and attach it to
         * the page. Then, you may begin adding components to this application
         * or customize the JavaScript scaffolding to fit your unique needs.
         */

        app.config.globalProperties.$message = message;
        app.config.globalProperties.$log = console.log;
        app.config.globalProperties.$route = route;
        app.config.globalProperties.$formatSize = formatSize;

        app.mount(el);

        InertiaProgress.init({
            // The delay after which the progress bar will
            // appear during navigation, in milliseconds.
            delay: 250,

            // The color of the progress bar.
            color: "#c0392b",

            // Whether to include the default NProgress styles.
            includeCSS: true,

            // Whether the NProgress spinner will be shown.
            showSpinner: true,
        });
    },
});
