import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.js'],
            refresh: true,
        }),
    ],
    build: {
        cssCodeSplit: false, // Inline CSS to prevent FOUC
        rollupOptions: {
            input: {
                app: 'resources/js/app.js'
            }
        }
    },
    css: {
        devSourcemap: true
    }
});
