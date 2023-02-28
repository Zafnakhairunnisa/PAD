const mix = require("laravel-mix");
const path = require("path");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.setPublicPath("public")
    .setResourceRoot("../") // Turns assets paths in css relative to css file
    .vue()
    .sass("resources/sass/frontend/app.scss", "css/frontend.css")
    .sass("resources/sass/backend/app.scss", "css/backend.css")
    .js("resources/js/frontend/app.js", "js/frontend.js")
    .js("resources/js/backend/app.js", "js/backend.js")
    .extract([
        "alpinejs",
        "jquery",
        "jquery-mask-plugin",
        "bootstrap",
        "popper.js",
        "axios",
        "sweetalert2",
        "lodash",
        "vue",
        "vue-router",
        "ant-design-vue",
        "pinia",
        "@ant-design/icons-vue",
        "@tanstack/vue-query",
        "echarts",
        "vue-echarts",
    ])
    .alias({
        ziggy: path.resolve("vendor/tightenco/ziggy/dist/vue"), // or 'vendor/tightenco/ziggy/dist/vue' if you're using the Vue plugin
        "@": path.join(__dirname, "resources/js"),
        "@fe/hooks": path.join(__dirname, "resources/js/frontend/hooks"),
        "@fe/components": path.join(
            __dirname,
            "resources/js/frontend/components"
        ),
        "@fe/views": path.join(__dirname, "resources/js/frontend/views"),
        "@fe/assets": path.join(__dirname, "resources/js/frontend/assets"),
        "@fe/stores": path.join(__dirname, "resources/js/frontend/stores"),
        "@fe/utils": path.join(__dirname, "resources/js/frontend/utils"),
    })
    .webpackConfig({
        module: {
            rules: [
                {
                    test: /\.less$/,
                    loader: require.resolve("less-loader"), // compiles Less to CSS
                    options: {
                        lessOptions: {
                            modifyVars: {
                                "border-radius-base": "2px",
                                "primary-color": "#D55143",
                                "layout-body-background": "#fff",
                                "font-family": '"Poppins", sans-serif',
                                "card-radius": "20px",
                                "card-shadow":
                                    "5px 5px 40px -25px rgb(112 112 112 / 44%)",
                                "table-header-bg": "#F9EBEA",
                                "table-header-color": "#141414",
                                "table-border-color": "#D9D9D9",
                            },
                            javascriptEnabled: true,
                        },
                    },
                },
            ],
        },
        output: {
            chunkFilename: "js/[name].js?id=[chunkhash]",
        },
    })
    .sourceMaps();

if (mix.inProduction()) {
    mix.version();
} else {
    // Uses inline source-maps on development
    mix.webpackConfig({
        devtool: "inline-source-map",
    });
}
