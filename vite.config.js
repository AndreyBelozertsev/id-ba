import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path'; // add import for path

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/scss/main.scss',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: [{
            find: '../font',
            replacement: path.resolve(__dirname, 'public/fonts'), // replace this path with your actual path
        }],
    }
});
