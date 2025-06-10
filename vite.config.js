import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
});

module.exports = {
    theme: {
        extend: {
            fontFamily: {
                helveticaNeue: [
                    '"Helvetica Neue LT Std"',
                    "Helvetica",
                    "Arial",
                    "sans-serif",
                ],
            },
        },
    },

    
};
