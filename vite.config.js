import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true, // enables hot reload
        }),
    ],
    server: {
        host: '0.0.0.0',       // exposes server to LAN
        port: 5173,
        strictPort: true,      // fail if port is busy
        hmr: {
            host: 'localhost', // ensures HMR WebSocket connects correctly
            protocol: 'ws',    // can also be 'wss' if using HTTPS
        },
    },
});
