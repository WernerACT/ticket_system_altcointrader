import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import mkcert from'vite-plugin-mkcert'

export default defineConfig({
    server: {
        watch: {
            usePolling: true
        },
        https: true },

    plugins: [
        mkcert(),
        laravel({

            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: [
                'app/Livewire/**',
            ]

        }),
    ],
});
