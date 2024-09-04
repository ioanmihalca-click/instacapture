import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/photoswipe.css',
                'resources/js/photoswipe.js'
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            'photoswipe': 'photoswipe/dist/photoswipe.esm.js',
        },
    },
});