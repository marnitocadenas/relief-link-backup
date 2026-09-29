import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    root: '.',
    envDir: '..',
    plugins: [
        laravel({
            publicDirectory: '../backend/public',
            buildDirectory: 'build',
            hotFile: '../backend/public/hot',
            input: 'src/js/app.jsx',
            refresh: true,
        }),
        react(),
    ],
    server: {
        host: '0.0.0.0',
        port: 5173,
        hmr: {
            host: '127.0.0.1',
        },
    },
    build: {
        chunkSizeWarningLimit: 10000,
    },
});
