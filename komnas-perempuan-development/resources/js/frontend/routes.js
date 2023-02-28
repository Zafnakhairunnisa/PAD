// Vue Router

const routes = [
    {
        path: "/",
        component: () => import("./views/Home"),
    },
    {
        path: "/kelembagaan/peraturan-dan-kebijakan",
        component: () => import("./views/Institutional/Regulation/Regulation"),
    },
    {
        path: "/kelembagaan/peraturan-dan-kebijakan/:slug/dokumen",
        component: () => import("./views/Institutional/Regulation/Document"),
    },
];

export default routes;
