import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from 'tailwindcss';

export default defineConfig({
    plugins: [
        laravel(['resources/css/app.css',
            'resources/sass/app.scss',
            'resources/js/app.js',
            'resources/js/bootstrap.js',
            'resources/js/reflectionSummary.js',
            'resources/js/profile/userProfile.js',
            'resources/js/shared/toaster.js']),
        tailwindcss('./tailwind.config.js'),
    ],
});
