import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/js/app.js',
                'resources/js/bootstrap.js',
                'resources/js/crud.js',
                'resources/js/setUp.js',
                'resources/js/auth/login.js',
                'resources/js/admin/division.js',
                'resources/js/admin/event.js',
                'resources/js/admin/form.js',
                'resources/js/admin/highlight.js',
                'resources/js/admin/response.js',
                'resources/js/admin/user.js',
            ],
            refresh: true,
        }),
    ],
});
