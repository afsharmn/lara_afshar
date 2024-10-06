import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';
import postcssRTLCSS from "postcss-rtlcss";
import dotenv from 'dotenv';


const direction = dotenv.config().parsed.APP_DIRACTION;

const config = {
    plugins: [
        laravel({
            input: [
                'resources/scss/admin/admin.scss',
                'resources/scss/site/site.scss',
                'resources/js/admin/admin.js',
                'resources/js/site/site.js',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '$': 'jQuery',
        },
    },
    css: {
        preprocessorOptions: {
            scss: {
                api: 'modern-compiler',
            },
        },
        ...(direction === 'rtl' && {
            postcss: {
                plugins: [postcssRTLCSS],
            },
        }),
    },
};

export default defineConfig(config);
